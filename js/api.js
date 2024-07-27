(function($){

	axios.defaults.baseURL = 'client/models/';
	axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
    let pathname = window.location.pathname.split("/")
	
	//Begin Search
    if (pathname === '/' || pathname === '/index'){ null }
    else{
        const search = document.querySelector("[data-search]")
        let searchResults = []
        if (search) {
            search.addEventListener("keyup", (e) => {
                axios.post(`/search`, { payload: e.target.value, pathname: pathname })
                    .then((response) =>	 { console.log(response.data) })
                    .catch((error) => { console.log(error) })
                })
        }
    }
		
	//End Search 
	// Begin Contact Information			
        if (pathname === 'contact' || pathname === 'services' || pathname === '/'){
            const submitButton = document.querySelector("[data-submit]")
			const contactForm = document.querySelector("[data-contactForm]")
			const feedback = document.getElementById("feedback-message")
			const feedbackIcon = document.getElementById("feedback-icon")
			const closeIcon = document.querySelector("[data-close]")

			let name = document.querySelector("[data-name]")
			let phone = document.querySelector("[data-phone") 
			let company = document.querySelector("[data-company]")
			let email = document.querySelector("[data-email]")
			let message = document.querySelector("[data-message]")

			function errorMessage({ status, data }){
				contactForm.reset()
				closeIcon.innerHTML = '&times;'
				feedback.classList.add(status === 200 ? "alert-primary" : "alert-danger")
				feedbackIcon.classList.add(status === 200 ? "bi-check2-all" : "bi-exclamation")
				feedback.innerText = data || 'Somthing went wrong. Please try again later.'
			} 

			
			submitButton.addEventListener("click", (e) => {
				let input = [name, phone, company, email, message]
				let errorMessages = []

				function validateForm(input){
					const emailFormat  = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'
					input.forEach(input => {
						if (input.value.length === '' || input.value === null || input.value.length < 3){
							errorMessages.push(`${input.name} cannot be empty or less than 3 characters.`)
						}
						if (input.name === "email" && email.value.match(emailFormat)) {
							errorMessages.push(`${input.name} entered is not a valid email`)
						}
					});
				}

				validateForm(input)

				if (errorMessages.length > 0){
					e.preventDefault()
					feedback.classList.add("alert-danger")
					feedbackIcon.classList.add("bi-exclamation")
					feedback.innerText = errorMessages[0]
				} 
				else{
					e.preventDefault()
					axios.post('/contact/send', { 
						name: name.value, phone: phone.value, company: company.value,
						email: email.value, message: message.value,
					})
						.then((response) => { errorMessage(response) })
						.catch((error) => { errorMessage(error) })
				}
			})
        }

	//Begin Footer Post Section
		const months = [ '', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ]
		axios.get('/blog').then((response) => { 
			let posts = response.data;
			for (let post of posts.slice(0, 2)){
				let day = post.date.split('T')[0].split('-')[2]
				let month = post.date.split('T')[0].split('-')[1].split('')[1]

				$('.widget-content-post-footer').append(`
					<div class="post">
						<div class="thumb"><a href="blog-detail">
						<img src=${post.banner} alt=""></a></div>
						<h5><a href="blog-detail?pidf=${post._id}">${post.title}</a></h5>
						<ul class="info">
							<li>${day} ${months[month]}</li>
							<li>${post.comments.length} comments</li>
						</ul>
					</div>
				`)
			}
		})
	//End Footer Post Section
    
    //Homepage Section
        //Home Featured Services
        if (pathname === '/' || pathname === '/index') {
            fetch('/services.json').then((response) => {
                let services = response.data
                console.log(services)
                // services.forEach((serv   ice) => { loadServices(service) });
            })

            function loadServices(service) {
                let serviceElement = document.querySelector('[data-service]')
                $(serviceElement).owlCarousel('add',
                    `<div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box"><figure class="image"><a href="service-detail?sid=${service._id}"><img src=${service.banner} alt="" width="500" height="600"></a></figure></div>
                            <div class="caption-box">
                                <h3><a href="service-detail?sid=${service._id}">${service.title}</a></h3>
                            <div class="link-box"><a href="service-detail?sid=${service._id}>Read More <i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                    </div>`)
            }

            // Blog & News Section
            axios.get("/blog").then((response) => {
                let posts = response.data                
                for (let post of posts.slice(0, 4)){ loadPosts(post) }
                
                function loadPosts(post){
                    let day = post.date.split('T')[0].split('-')[2]
                    let month = post.date.split('T')[0].split('-')[1].split('')[1]
                    let year = post.date.split('T')[0].split('-')[0]
                    let postElement = document.querySelector('[data-news]')
                    postElement.innerHTML += 
                        `<!-- News Block -->
                        <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src=${post.banner} alt=""></figure>
                                    <div class="overlay-box"><a href="blog-detail?pid=${post._id}"><i class="fa fa-link"></i></a></div>
                                </div>
                                <div class="caption-box">
                                    <div class="inner">
                                        <h3><a href="blog-detail?pid=${post._id}">${post.title}</a></h3>
                                        <ul class="info">
                                            <li>${day} ${months[month]} ${year}</li>
                                            <li><a href="blog-detail-2?pid=${post._id}">${post.author}</a></li>
                                            <li><a href="blog-detail-2?pid=${post._id}">${post.comments.length} comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>`
                }
            })
        }
        
    //End Homepage Section
    
    //Begin About Section
        if (pathname === '/about'){
            axios.get("/team").then((response) => {
                let members = response.data
               for (let member of members.splice(0, 3)){ loadMembers(member) };
               function loadMembers(member){
                   let memberElement = document.querySelector('[data-team]')
                   memberElement.innerHTML += 
                    `<!-- Team Block -->
                    <div class="team-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="team">
                                    <img src=${member.profilePhoto} alt=""></a></div>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                </ul>
                                <h3 class="name"><a href="team">${member.fullName}</a></h3>
                            </div>
                            <span class="designatiion">${member.position}</span>
                        </div>
                    </div>`
               }
            })
        }
        
    //End About Section

    //Begin Team Section
        if (pathname === '/team'){
            axios.get('/team').then((response) => {
                let members = response.data
                members.forEach(member => { loadMembers(member)});
            })

            function loadMembers(member){
                let memberElement = document.querySelector('[data-team]')
                memberElement.innerHTML += 
                    `<!-- Team Block -->
                    <div class="team-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="team">
                                    <img src=${member.profilePhoto} alt=""></a></div>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                </ul>
                                <h3 class="name"><a href="team">${member.fullName}</a></h3>
                            </div>
                            <span class="designatiion">${member.position}</span>
                        </div>
                    </div>`
            }
        }
    //End Team Section
    
    //Begin Services Section
        if (pathname[pathname.length - 1] === 'services'){
            $(window).ready(function () {
                fetch('/services').then((response) => {
                    let services = response.data
                    console.log(services)
                    services.forEach((service) => { loadServices(service) });
                })
                function loadServices(service) {
                    let serviceElement = document.querySelector('[data-service]')
                    $(serviceElement).owlCarousel('add',
                        `<div class="service-block-two">
                            <div class="inner-box">
                                <div class="image-box"><figure class="image"><a href="service-detail?sid=${service._id}"><img src=${service.banner} alt="" width="500" height="600"></a></figure></div>
                                <div class="caption-box">
                                    <h3><a href="service-detail?sid=${service._id}">${service.title}</a></h3>
                                <div class="link-box"><a href="service-detail?sid=${service._id}">Read More <i class="fa fa-angle-double-right"></i></a></div>
                            </div>
                        </div>`
                    )
                }
            });
        }
    //End Services Section

    //Begin Blog & News Section
        if (pathname === '/blog'){
            axios.get('/blog').then((response) => {
                let posts = response.data

                for (let post of posts.slice(0, 2)){
                    $('.widget-content-post').append(`
                        <article class="post">
                            <div class="post-thumb"><a href="blog-detail"><img src=${post.banner} alt=""></a></div>
                            <h3><a href="blog-detail">${post.title}</a></h3>
                            <div class="post-info">by ${post.author}</div>
                        </article>
                    `)

                }

                posts.forEach((posts) => { loadPosts(posts) })

                function loadPosts(post){
                    let day = post.date.split('T')[0].split('-')[2]
                    let month = post.date.split('T')[0].split('-')[1].split('')[1]
                    let year = post.date.split('T')[0].split('-')[0]
                    $('.blog-classic').append(
                        `<!-- News Block -->
                        <div class="news-block-two wow fadeIn">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src=${post.banner} alt=""></figure>
                                    <div class="overlay-box"><a href="blog-detail?pid=${post._id}"><i class="fa fa-link"></i></a></div>
                                </div>
                                <div class="caption-box">
                                    <div class="inner">
                                        <h3><a href="blog-detail?pid=${post._id}">${post.title}</a></h3>
                                        <ul class="info">
                                            <li>${day} ${months[month]} ${year}</li>
                                            <li><a href="blog-detail-2?pid=${post._id}">${post.author}</a></li>
                                            <li><a href="blog-detail-2?pid=${post._id}">${post.comments.length} comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    )
                    
                    let keywords = post.keywords
                    
                    keywords.forEach((keyword) => {
                        $('.tag-list').append(`<li><a href="#">${keyword}</a></li> `)
                    })
                }
            })
        }
    //End Blog & News Section

//End Api Section

})(window.jQuery);