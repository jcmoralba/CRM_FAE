document.getElementById("printTableButton").addEventListener("click", () => {
  const table = document.getElementById("example");
  if (table) {
    // Remove the action column
    const actionColumnIndex = table.rows[0].cells.length - 1;
    for (let i = 0; i < table.rows.length; i++) {
      table.rows[i].deleteCell(actionColumnIndex);
    }

    const printWindow = window.open('', '_blank');
    printWindow.document.open();
    // Include necessary styles
    printWindow.document.write('<html><head><title>Print Table</title>');
    printWindow.document.write('<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">');
    printWindow.document.write('<link rel="stylesheet" type="text/css" href="https://cdn.tailwindcss.com">');
    printWindow.document.write('</head><body>');
    
    // Clone the table with its styles
    const clonedTable = table.cloneNode(true);
    printWindow.document.body.appendChild(clonedTable);
    
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
  } else {
    alert("Table not found!");
  }
});