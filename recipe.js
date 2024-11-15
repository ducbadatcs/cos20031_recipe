let recipes = null;

// Get data from the JSON file
fetch('recipes.json')
    .then(response => response.json())
    .then(data => {
        recipes = data;
        addDataToHTML(recipes);
    });

// Show recipe data in the table
function addDataToHTML(recipesToDisplay) {
    // Get the table body element
    const recipelistHTML = document.querySelector('.recipelist');
    recipelistHTML.innerHTML = ''; // Clear any existing content

    // Add new data
    recipesToDisplay.forEach(recipe => {
        // Create a table row
        const row = document.createElement('tr');

        // Set the row's inner HTML with table cells
        row.innerHTML = `
            <td>
                <div class="img"><img src="${recipe.image}" alt="${recipe.name}" width="50" height="50"></div>
                <div class="name"><a href="recipe-detail.php?id=${recipe.id}">${recipe.name}</a></div>
            </td>
            <td class="calories">${recipe.calories}</td>
            <td class="carbs">${recipe.carbs}g</td>
            <td class="fat">${recipe.fat}g</td>
            <td class="protein">${recipe.Protein}g</td>
        `;

        // Append the row to the table body
        recipelistHTML.appendChild(row);
    });
    let recipes = null;
let isDescending = true; // Initialize sort order as descending

// Fetch data from the JSON file
fetch('recipes.json')
    .then(response => response.json())
    .then(data => {
        recipes = data;
        addDataToHTML(recipes); // Initially display all recipes
    });

// Show recipe data in the table
function addDataToHTML(recipesToDisplay) {
    const recipelistHTML = document.querySelector('.recipelist');
    recipelistHTML.innerHTML = ''; // Clear existing content

    // Add new data
    recipesToDisplay.forEach(recipe => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <div class="img"><img src="${recipe.image}" alt="${recipe.name}" width="50" height="50"></div>
                <div class="name"><a href="recipe-detail.php?id=${recipe.id}">${recipe.name}</a></div>
            </td>
            <td class="calories">${recipe.calories}</td>
            <td class="carbs">${recipe.carbs}g</td>
            <td class="fat">${recipe.fat}g</td>
            <td class="protein">${recipe.Protein}g</td>
        `;
        recipelistHTML.appendChild(row);
    });
}

// Filter recipes based on the search input
function searchRecipes() {
    const searchTerm = document.getElementById('search').value.toLowerCase();
    const filteredRecipes = recipes.filter(recipe =>
        recipe.name.toLowerCase().includes(searchTerm)
    );
    addDataToHTML(filteredRecipes);
}

// Sort recipes based on selected criteria and toggle order
function sortRecipes() {
    const sortBy = document.getElementById('sort').value;
    const sortedRecipes = [...recipes].sort((a, b) => {
        return isDescending ? b[sortBy] - a[sortBy] : a[sortBy] - b[sortBy];
    });
    addDataToHTML(sortedRecipes);
}

// Toggle the sorting order, update the button label, and re-sort
function toggleSortOrder() {
    isDescending = !isDescending; // Toggle the sorting order
    document.getElementById('toggleSortOrder').textContent = isDescending ? "Highest" : "Lowest";
    sortRecipes(); // Re-sort the recipes with the new order
}

// Event listeners
document.getElementById('search').addEventListener('input', searchRecipes);
document.getElementById('sort').addEventListener('change', sortRecipes);
document.getElementById('toggleSortOrder').addEventListener('click', toggleSortOrder);
}