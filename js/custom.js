currentPage = window.location.pathname;

const pageFunctions = {
  '/services': services,
  '/blog': posts,
  '/team': team,
  '/projects': projects,
  '/index': homePage
};

for (const [path, func] of Object.entries(pageFunctions)) {
  if (currentPage === path) {
    func();
    break;
  }
}


function homePage() {
  fetch('models/services.json')
    .then((response) => response.json())
    .then((services) => {
      services.forEach((service) => loadServices(service));
      
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
    })

  fetch("models/ongoing_projects.json")
    .then(response => response.json())
    .then(ongoingProjects => {
      ongoingProjects.forEach(project => loadOngoingProject(project))

      function loadOngoingProject(project) {
        let ongoing_el = document.querySelector("[data-ongoing]")

        $(ongoing_el).owlCarousel('add',
          `<div class="project-block-two">
            <div class="image-box">
                <figure class="image"><img src=${project.imgUrl} alt=""></figure>
            </div>
            <div class="info-box">
                <div class="inner-box">
                    <span class="title">${project.category}</span>  
                    <h3>${project.title}</h3>
                    <div class="text">${project.description}</div>
                    <div class="link-box"><a href="projects">View Project</a></div>
                </div> 
            </div>
          </div>`
        )
      }
    })

  // Blog & News Section
  fetch("models/posts.json")
    .then((response) => response.json())
    .then((response) => {
      let posts = response     
      for (let post of posts.slice(0, 4)){ loadPosts(post) }
      
      function loadPosts(post){
          let [day, month, year] = post.date.split(" ");

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
                                  <li>${day} ${month} ${year}</li>
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

function services() {
  fetch("models/services.json")
    .then((response) => response.json())
    .then((services) => {
      services.forEach((service) => loadServices(service));

      function loadServices(service) {
        let serviceElement = document.querySelector("[data-service]");
        $(serviceElement).owlCarousel(
          "add",
          `<div class="service-block-two">
                <div class="inner-box">
                <div class="image-box">
                    <figure class="image">
                        <a href="service-detail?sid=${service._id}">
                            <img src=${service.banner} alt="" width="500" height="600">
                            </a>
                    </figure>
                </div>
                <div class="caption-box">
                    <h3><a href="service-detail?sid=${service._id}">${service.title}</a></h3>
                    <div class="link-box">
                        <a href="service-detail?sid=${service._id}">Read More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>`
        );
      }
    })
    .catch((error) => console.error(error));
}

function projects() {
  fetch("models/projects.json")
    .then((data) => data.json())
    .then((projects) => {
      projects.forEach((project) => loadProjects(project));

      function loadProjects(project) {
        $('.filter-list').append(`
        <!-- Project Block -->
        <div class="project-block all mix ${project.category} col-lg-6 col-md-6 col-sm-12" style="display: inline;">
          <div class="image-box">
            <figure class="image"><img src="${project.banner}" alt=""></figure>
            <div class="overlay-box">
              <h4><a href="project-detail">${project.title} <br>Project</a></h4>
              <div class="btn-box">
                <a href="${project.banner}" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                <a href="project-detail?pid=${project._id}"><i class="fa fa-external-link"></i></a>
              </div>
              <span class="tag">${project.category}</span>
            </div>
          </div>
        </div>`)
      }
    })
}

function posts() {
  fetch("models/posts.json")
    .then((response) => response.json())
    .then((posts) => {
      posts.forEach((service) => loadPosts(service));

      function loadPosts(post) {
        let [day, month, year] = post.date.split(" ");

        $('.blog-classic').append(`
          <!-- News Block -->
          <div class="news-block-two wow fadeIn">
              <div class="inner-box">
                <div class="image-box">
                    <figure class="image"><img src="${post.banner}" alt=""></figure>
                    <div class="overlay-box"><a href="blog-detail?pid=${post._id}"><i class="fa fa-link"></i></a></div>
                </div>
                <div class="caption-box">
                  <div class="inner">
                    <h3><a href="blog-detail?pid=${post._id}">${post.title}</a></h3>
                    <ul class="info">
                        <li>${day} ${month} ${year}</li>
                        <li><a href="blog-detail-2?pid=${post._id}">${post.author}</a></li>
                        <li><a href="blog-detail-2?pid=${post._id}">${post.comments.length} comments</a></li>
                    </ul>
                  </div>
                </div>
              </div>
          </div>`
        );

        let keywords = post.keywords;

        keywords.forEach((keyword) => {
          $('.tag-list').append(`<li><a href="#">${keyword}</a></li> `);
        });
      }
    })
    .catch((error) => console.error(error));
}

function team() {
  fetch("models/team.json")
    .then(response => response.json())
    .then(members => {
      
      members.forEach((member) => loadMembers(member));

      function loadMembers(member){        
        $('.team').append(
          `<!-- Team Block -->
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <div class="image"><a href="team">
                            <img src=${member.avatar} alt=""></a>
                        </div>
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
            </div>`)
    }
    })

}