//--------------------------------------------------------------------------------------------------
//   IT Inventory
//      © 2025 Remus Rigo
//         v1.0.20261005
//   Hide Table Empty Columns
//--------------------------------------------------------------------------------------------------

function HideTableEmptyColumns(tableId) {
   const table = document.getElementById(tableId);
   const rows = table.rows;
   const colCount = rows[0].cells.length;

   // reset all columns / filter is cleared)
   for (let row = 0; row < rows.length; row++) {
      for (let col = 0; col < colCount; col++) {
         rows[row].cells[col].style.display = '';
      }
   }

   for (let col = 0; col < colCount; col++) {
      let empty = true;

      // check all rows on current column
      for (let row = 1; row < rows.length; row++) {

         // Ignore hidden rows
         if (rows[row].style.display === 'none')
            continue;

         const cellText = rows[row].cells[col].textContent.trim();

         if (cellText !== '') {
            empty = false;
            break;
         }
      }

      // hide empty column
      if (empty) {
         for (let row = 0; row < rows.length; row++) {
            rows[row].cells[col].style.display = 'none';
         }
      }
   }
}
