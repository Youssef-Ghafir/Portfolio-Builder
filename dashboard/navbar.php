<ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 justify-center" id="navbar">
    <li class="me-2">
        <a href="#" class="flex items-center justify-center p-4 border-b-2 rounded-t-lg hover:border-gray-300 group gap-2" data-page="home">
            <i class="fa-regular fa-user"></i>
            Hero Section
        </a>
    </li>
    <li class="me-2">
        <a href="#" class="flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg  hover:border-gray-300 group gap-2" data-page="about">
            <i class="fa-solid fa-address-card"></i>
            About Section
        </a>
    </li>
    <li class="me-2">
        <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active  group" aria-current="page" data-page="works">
            <svg class="w-4 h-4 me-2 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
            </svg>Dashboard
        </a>
    </li>
    <input type="hidden" class="border-b-2 border border-blue-600">
</ul>
<script>
    const navbar = document.querySelectorAll("#navbar li a");
    let params = window.location.search;
    let page_param = new URLSearchParams(params).get("page");
    const params_data = ["about", "works", "contact"];
    navbar.forEach((item) => {
        item.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
        item.children[0].classList.remove("text-blue-600");
        if (!page_param && item.getAttribute("data-page") == "home") {
            item.classList.add("text-blue-600", "border-b-2", "border-blue-600");
            item.children[0].classList.add("text-blue-600");
        }
        if (item.getAttribute("data-page") == page_param) {
            item.classList.add("text-blue-600", "border-b-2", "border-blue-600");
            item.children[0].classList.add("text-blue-600");
        }
    })
</script>