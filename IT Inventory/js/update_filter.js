<<<<<<< HEAD
//--------------------------------------------------------------------------------------------------
//   IT Inventory
//      © 2025 Remus Rigo
//         v20260304
//   Update filter
//--------------------------------------------------------------------------------------------------

function updateFilter(paramName) {
    const value = document.getElementById(paramName).value;

    // Read existing query parameters
    const params = new URLSearchParams(window.location.search);

    // Update or add the manufacturer parameter
    params.set(paramName, value);

    // Reload with updated parameters
    window.location = 'index.php?' + params.toString();
}

=======
//--------------------------------------------------------------------------------------------------
//   IT Inventory
//      © 2025 Remus Rigo
//         v20260304
//   Update filter
//--------------------------------------------------------------------------------------------------

function updateFilter(paramName) {
    const value = document.getElementById(paramName).value;

    // Read existing query parameters
    const params = new URLSearchParams(window.location.search);

    // Update or add the manufacturer parameter
    params.set(paramName, value);

    // Reload with updated parameters
    window.location = 'index.php?' + params.toString();
}

>>>>>>> 3ec6966 (2026-04-06 21:36:37)
