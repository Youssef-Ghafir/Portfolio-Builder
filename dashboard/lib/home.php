<div>
    <div class="">
        <div class="relative w-[80px] h-[80px]" id="avatar">
            <span class="w-[80px] h-[80px] rounded-full bg-white shadow-md block"></span>
            <input type="file" class="absolute top-0 left-0 w-full h-full opacity-0" hidden id="image_profile" accept="image/*" />
            <label for="image_profile"><i class="fa-solid fa-pen-to-square absolute top-2 right-1 cursor-pointer text-stone-500"></i></label>
        </div>
        <p class="text-sm text-stone-500 mt-4">Upload your Image Here</p>
    </div>
    <div class="mt-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 ">Your Name</label>
        <input type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 max-w-[550px]" id="name" placeholder="e.g., John Doe">
    </div>
    <div class="mt-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 ">Professional Title and Location</label>
        <input type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 max-w-[550px]" id="title" placeholder="e.g., A Website Designer Based in Jakarta, Indonesia">
    </div>
    <div class="mt-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 ">Passion or Specialty</label>
        <input type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 max-w-[550px]" id="passion" placeholder="e.g., Passionate in Creating Great Experiences for Digital Products">
    </div>
    <button type="button" class="text-white mt-6 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Save</button>

</div>
<script>
    const email = document.getElementById("email_user");
    const name = document.getElementById("name");
    const title = document.getElementById("title");
    const passion = document.getElementById("passion");
    const loader = document.getElementById("loading");
    const avatar = document.getElementById("avatar");
    const getData = async () => {
        try {
            let resp = await fetch(`http://localhost/portfolio-builder/dashboard/api/handleHero.php?email=${email.value}`);
            if (!resp.ok) throw new Error(resp.statusText);
            let data = await resp.json();
            console.log(data);
        } catch (error) {
            console.log(error);

        }
    };
    getData().then((resp) => {
        loader.classList.add("hidden");
        if (resp?.data) {
            name.value = resp.data.name;
            title.value = resp.data.title;
            passion.value = resp.data.passion;
        }
    });
    const fileInput = document.getElementById("image_profile")
    fileInput.addEventListener("change", async () => {
        let [file] = fileInput.files
        const reader = new FileReader();
        reader.addEventListener("load", (e) => {
            const img = avatar.querySelector("img");
            if (img) {
                img.src = e.target.result;
            } else {
                // Create a new image element if none exists
                const newImg = document.createElement("img");
                newImg.src = e.target.result;
                newImg.alt = "";
                newImg.className = "w-[80px] h-[80px] rounded-full bg-white shadow-md block object-cover";

                // Clear the avatar element and append the new image
                // avatar.innerHTML = ""; // Clear any existing children
                let span = avatar.querySelector("span");
                if (span) {
                    span.remove();
                };
                avatar.appendChild(newImg);
            }
        });
        reader.onerror = (err) => {
            console.error("Error reading file:", err);
            alert("An error occurred while reading the file.");
        };


        reader.readAsDataURL(file);
    })
</script>