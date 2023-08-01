<style>
body {
    font-family: "Poppins", Arial, sans-serif;
    font-size: 14px;
    line-height: 1.8;
    font-weight: normal;
    background: beige;
    color: gray;
}
a {
    -webkit-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    transition: 0.3s all ease;
    color: #f8b739;
}
a:hover,
a:focus {
    text-decoration: none !important;
    outline: none !important;
    -webkit-box-shadow: none;
    box-shadow: none;
}
button {
    -webkit-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    transition: 0.3s all ease;
}
button:hover,
button:focus {
    text-decoration: none !important;
    outline: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
}
h1,
h2,
h3,
h4,
h5,
.h1,
.h2,
.h3,
.h4,
.h5 {
    line-height: 1.5;
    font-weight: 400;
    font-family: "Poppins", Arial, sans-serif;
    color: #000;
}
.ftco-section {
    padding: 7em 0;
}
.ftco-no-pt {
    padding-top: 0;
}
.ftco-no-pb {
    padding-bottom: 0;
}
.heading-section {
    font-size: 28px;
    color: #000;
}
.heading-section small {
    font-size: 18px;
}
.img {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}
.navbar-btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    outline: none !important;
    border: none;
}
.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}
.wrapper {
    width: 100%;
}
#sidebar {
    min-width: 300px;
    max-width: 300px;
    background: #1d1919;
    color: #fff;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    border-color: #f8b739;
}
#sidebar.active {
    margin-left: -300px;
}
#sidebar .logo {
    display: block;
    width: 200px;
    height: 200px;
    margin: 0 auto;
    border-style:solid;
    border-color: #f8b739;
}
#sidebar .logo span {
    display: block;
}
#sidebar ul.components {
    padding: 0;
}
#sidebar ul li {
    font-size: 16px;
}
#sidebar ul li > ul {
    margin-left: 10px;
}
#sidebar ul li > ul li {
    font-size: 14px;
}
#sidebar ul li a {
    padding: 10px 0;
    display: block;
    color: rgba(255, 255, 255, 0.8);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
#sidebar ul li a:hover {
    color: #f8b739;
}
#sidebar ul li.active > a {
    background: transparent;
    color: #f8b739;
}
@media (max-width: 991.98px) {
    #sidebar {
        margin-left: -300px;
    }
    #sidebar.active {
        margin-left: 0;
    }
}
a[data-toggle="collapse"] {
    position: relative;
}
.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 0;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}
@media (max-width: 991.98px) {
    #sidebarCollapse span {
        display: none;
    }
}
#content {
    width: 100%;
    padding: 0;
    min-height: 100vh;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}
/*. btn.btn-primary {
    background: #f8b739;
    border-color: #f8b739;
} */
.btn.btn-primary:hover,
.btn.btn-primary:focus {
    background: #f8b739 !important;
    border-color: #f8b739 !important;
}
.footer p {
    color: rgba(255, 255, 255, 0.5);
    text-align: center;
}

ul.nav.navbar-nav > li.nav-item > a.nav-link:hover,
ul.nav.navbar-nav > li.nav-item > a.nav-link:active {
    color: #f8b739 !important;
}

</style>