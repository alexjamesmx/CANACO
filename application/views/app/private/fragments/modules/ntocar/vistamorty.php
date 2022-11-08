<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>Rick and morty</h1>
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="https://enlacecanaco.org/app/morty/infogeneral">Personajes</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Opiniones</a>
                                </li>
                                
                            </ol>
                        </nav>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row-2 col-12 col-lg- mb-4">
                
               
                <script>
                        fetch('https://rickandmortyapi.com/api/character' , {
                            method: 'GET'
                        })
                        .then(response => response.json())
                        
                        .then(function(json){
                            console.log(json);    
                            json.results.map(function(results)
                            {
                                var container = document.querySelector('.row-2');
                               console.log(results);
                                // console.log(json);
                                container.innerHTML+=`
                                
                                <div class="col-12 col-lg-6 mb-4">
                                    <div class="card flex-row listing-card-container">
                                        <div class="w-40 position-relative">
                                            <a href="https://enlacecanaco.org/app/morty/detalle_info/`+ results.id +`">
                                                <img class="card-img-left" 
                                                src=` + results.image +` alt="Card image cap">
                                            </a>
                                        </div>
                                        <div class="w-60 d-flex align-items-center">
                                            <div class="card-body">
                                                <a href="https://enlacecanaco.org/app/morty/detalle_info/`+ results.id +`">
                                                    <h5 class="mb-3 listing-heading ellipsis">
                                                        `+
                                                        results.name
                                                        +`
                                                    </h5>
                                                </a>
                                                <p class="listing-desc text-muted ellipsis">
                                                    `+
                                                        results.species
                                                    +`. 
                                                    <br>
                                                    `+
                                                        results.status
                                                    +`.
                                        
                                                </p>
                                                <br>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                `;
                             
                            })
                            
                        })
                </script>


                <!-- 
                <div class="col-12 col-lg-6 mb-5">
                    <div class="card flex-row listing-card-container">
                        <div class="w-40 position-relative">
                            <a href="Pages.Blog.Detail.html">
                                <img class="card-img-left" src="https://enlacecanaco.org/static/uploads/perfil/shshsjsa20211116221601.png" alt="Card image cap">
                            </a>
                        </div>
                        <div class="w-60 d-flex align-items-center">
                            <div class="card-body">
                                <a href="Pages.Blog.Detail.html">
                                    <h5 class="mb-3 listing-heading ellipsis">Assertively Iterate Resource
                                        Maximizing</h5>
                                </a>
                                <p class="listing-desc text-muted ellipsis">
                                    Keeping your eye on the ball while performing a deep dive on the
                                    start-up mentality to derive convergence on cross-platform integration.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
             -->

               

            </div>


         
        </div>