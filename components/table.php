<div class="table-container">
  <table>
    <thead>
        <tr>
            <th>S.No</th>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
      <?php
      if ($result->num_rows > 0) {
        $serial = 1;
        while($row = $result->fetch_assoc()){
      ?>

      <tr>
        <td><?php echo $serial++; ?></td>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["brand"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
        <td>
          <a class="btn edit" href="add_mobile.php?id=<?php echo $row['id']; ?>&return=<?php echo $currentPage?>">Edit</a>
          <button class="btn delete" onclick="confirmDelete(<?php echo $row['id']?>, '<?php echo $currentPage?>')">
            Delete
          </button>
        </td>
      </tr>

      <?php
        }
      } else {
      ?>
      <tr>
        <td colspan="5" style="text-align:center;">No record found.</td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>


<!-- confirming modal -->
<div id="deleteModal" class="modal">
  <div class="modal-content">
    <p>Are you sure you want to delete this mobile?</p>
    <button class="confirm" onclick="proceedDelete()">Yes</button>
    <button class="cancel" onclick="closeModal()">Cancel</button>
  </div>
</div>
<!-- confirming modal end-->


<script>
  let deleteId = null;
  let page = null;

  const confirmDelete = (id, currentPage)=>{
    deleteId = id;
    page = currentPage;
    document.getElementById('deleteModal').style.display = 'flex';
  };

  const closeModal = ()=>{
    document.getElementById('deleteModal').style.display = 'none';
  };

  const proceedDelete = ()=>{
    window.location.href = `../backend_pages/delete.php?id=${deleteId}&return=${page}`;
  };
</script>