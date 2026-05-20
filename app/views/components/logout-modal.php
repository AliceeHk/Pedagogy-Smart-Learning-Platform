<div id="logout-modal" class="modal-overlay">
  <div class="modal-box">
    <h2>Apakah kamu yakin untuk log out?</h2>
    <div class="modal-buttons">
      <button id="confirm-logout-btn" class="btn-logout">Log Out</button>
      <button id="cancel-logout-btn" class="btn-cancel">Cancel</button>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const logoutBtnSidebar = document.getElementById('sidebar-logout-btn');
    const logoutModal = document.getElementById('logout-modal');
    const cancelBtn = document.getElementById('cancel-logout-btn');

    if (logoutBtnSidebar && logoutModal) {
      logoutBtnSidebar.addEventListener('click', function(e) {
        e.preventDefault(); 
        logoutModal.classList.add('show');
      });
    }

    if (cancelBtn && logoutModal) {
      cancelBtn.addEventListener('click', function() {
        logoutModal.classList.remove('show');
      });
    }

    if (logoutModal) {
      logoutModal.addEventListener('click', function(e) {
        if (e.target === logoutModal) {
          logoutModal.classList.remove('show');
        }
      });
    }
  });
</script>