// Get the recipe ID from the URL query parameter
const urlParams = new URLSearchParams(window.location.search);
const recipeId = parseInt(urlParams.get('id'));

// Fetch data from the JSON file
fetch('recipes.json')
    .then(response => response.json())
    .then(data => {
        const recipe = data.find(item => item.id === recipeId);
        if (recipe) {
            displayRecipe(recipe);
        } else {
            console.error('Recipe not found');
        }
    })
    .catch(error => console.error('Error fetching recipe data:', error));

// Display recipe details in the HTML
function displayRecipe(recipe) {
    document.getElementById('recipeName').textContent = recipe.name;
    document.getElementById('recipeImage').src = recipe.image;
    document.getElementById('description').textContent = recipe.description;

    // Populate ingredients
    const ingredientsList = document.getElementById('ingredientsList');
    ingredientsList.innerHTML = ''; // Clear previous list items

    recipe.ingredients.forEach(ingredient => {
        const li = document.createElement('li');

        // Create text nodes for item, quantity, and measure with a line break
        const itemText = document.createTextNode(`${ingredient.item}: `);
        const quantityText = document.createTextNode(`${ingredient.quantity}`);
        const measureText = document.createTextNode(` ${ingredient.measure}`);

        // Append item text, line break, quantity, and measure to the list item
        li.appendChild(itemText);
        li.appendChild(quantityText);
        li.appendChild(document.createElement('br')); // Add line break
        li.appendChild(measureText);

        ingredientsList.appendChild(li);
    });


    // Populate directions
    const directionsList = document.getElementById('directionsList');
    recipe.directions.forEach(step => {
        const li = document.createElement('li');
        li.textContent = step;
        directionsList.appendChild(li);
    });
}
