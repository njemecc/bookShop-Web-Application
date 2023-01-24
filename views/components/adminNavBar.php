<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">BookFind </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link "
                href="/cart"
                tabindex="-1"
                aria-disabled="true"
                ><i class="fa-solid fa-cart-shopping"></i
              ></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/chart">charts</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/product/create">Insert product</a>
            </li>
            
          </ul>
          <form class="d-flex">
            <input
            data-search 
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>