document.addEventListener("DOMContentLoaded", function () {
    fetch("http://localhost/Menu/php/getMenuItems.php") //  El proyecto debe estar en htdocs de lo contrario ajustar esta url.
        .then(response => response.json())
        .then(data => {
            const menuItemsContainer = document.getElementById("menu-items");
            const allItems = data; // Almacena todos los items

            // Función para crear y mostrar tarjetas
            function displayItems(items) {
                menuItemsContainer.innerHTML = "";
                items.forEach(item => {
                    const menuItem = document.createElement("div");
                    menuItem.className = "menu-item";
                    menuItem.innerHTML = `
                        <img src="${item.imagen}" alt="${item.nombre}">
                        <h2>${item.nombre}</h2>
                        <p>${item.ingredientes}</p>
                        <p class="price">$${item.precio}</p>
                    `;
                    menuItemsContainer.appendChild(menuItem);
                });
            }

            // Mostrar todos los items al cargar
            displayItems(allItems);

            // Filtro por categorías
            const buttons = document.querySelectorAll(".filters button");
            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    const category = button.getAttribute("data-category");
                    const filteredItems = category === "Todos" ? allItems : allItems.filter(item => item.categoria === category);
                    displayItems(filteredItems);
                });
            });
        })
        .catch(error => console.error("Error fetching data:", error));
});
