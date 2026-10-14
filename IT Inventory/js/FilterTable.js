//--------------------------------------------------------------------------------------------------
//   IT Inventory: FilterTable.js: filter table data from header row
//      © 2025-2026 Remus Rigo
//         v1.1.20261001
//--------------------------------------------------------------------------------------------------

const table = document.getElementById('ItemsTable');

   function filterTable() {
      const filters = document.querySelectorAll('.FilterRow input');
      const rows = table.querySelectorAll('tbody tr');

      rows.forEach(row => {
         const cells = row.querySelectorAll('td');
         let visible = true;

         filters.forEach((filter, index) => {
            const value = filter.value.trim().toLowerCase();

            if (
               value &&
               cells[index] &&
               !cells[index].textContent.toLowerCase().includes(value)
            ) {
               visible = false;
            }

         });

         row.style.display = visible ? '' : 'none';

      });

   }

   document.querySelectorAll('.FilterRow input')
      .forEach(input => {
         input.addEventListener('input', onFilterChanged);
   });

   function onFilterChanged() {
      filterTable();
      HideTableEmptyColumns('ItemsTable');
   }
