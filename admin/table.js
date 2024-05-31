$('.btn-del').on('click', function(e) {
    
    e.preventDefault();
    
    const href = $(this).attr('href')
    
    Swal.fire ({
        
        title: 'Are you sure?',
        text: 'Record will be deleted',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1fd655',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete record',
        
    }).then((result) => {
        
        if(result.value) {
            
            document.location.href = href;
            
        }
        
    })
    
})

function toggleUpdate() {
    
   document.getElementById("update-modal").classList.toggle("active");
    
}

function toggleView() {
    
   document.getElementById("view-modal").classList.toggle("active");
    
}
