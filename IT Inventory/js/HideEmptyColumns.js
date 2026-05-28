//--------------------------------------------------------------------------------------------------
//   IT Inventory
//      © 2025 Remus Rigo
//         v2026-05-21
//   Hide Table Empty Columns
//--------------------------------------------------------------------------------------------------

function HideTableEmptyColumns(tableId) {
   const table = document.getElementById(tableId);
   const rows = table.rows;
   const colCount = rows[0].cells.length;

   for (let col = 0; col < colCount; col++) {
      let empty = true;

      for (let row = 1; row < rows.length; row++) {
         const cellText = rows[row].cells[col].textContent.trim();
         if (cellText !== '') {
            empty = false;
            break;
         }
      }

      if (empty) {
         for (let row = 0; row < rows.length; row++) {
            rows[row].cells[col].style.display = 'none';
         }
      }
   }
}
