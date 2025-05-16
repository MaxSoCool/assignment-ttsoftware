// หน้าต่างยืนยันเซฟ
document.getElementById('saveBtn').onclick = function() {
    if (document.getElementById('editForm').checkValidity()) {
        document.getElementById('saveModal').showModal();
    } else {
        document.getElementById('editForm').reportValidity();
    }
};
// หน้าต่างยืนยันสำเร็จ
document.getElementById('saveModal').addEventListener('close', function() {
    if (this.returnValue === 'confirm') {

        document.getElementById('editForm').submit();
    }
    
});
document.getElementById('successCloseBtn').onclick = function() {
    window.location = 'index.php';
};

// หน้าต่างยืนยันลบ
document.getElementById('deleteBtn').onclick = function() {
    document.getElementById('deleteModal').showModal();
};
// หน้าต่างลบสำเร็จ
document.getElementById('deleteSuccessCloseBtn').onclick = function() {
    window.location = 'index.php';
};

// หน้าต่างยกเลิก
document.getElementById('cancelBtn').onclick = function() {
    document.getElementById('cancelModal').showModal();
};
document.getElementById('cancelModal').addEventListener('close', function() {
    if (this.returnValue === 'confirm') {
        window.location = 'index.php';
    }
});

