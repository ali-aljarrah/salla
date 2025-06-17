<nav id="navbar" class="navbar navbar-expand-lg fixed-navbar mw-100">
    <div class="container">
        <a class="navbar-brand" href="/">شي تريند</a>
        <div class="collapse navbar-collapse justify-content-center ms-5 d-none d-lg-flex" id="navbarSupportedContent">
            <div>
                <form class="" role="search" method="post">
                    @csrf
                    <div>

                        {{-- search bar --}}

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="search-container">
                                        <input type="text" class="form-control search-input"
                                            placeholder="ادخل كلمة للبحث">

                                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end --}}

                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>
