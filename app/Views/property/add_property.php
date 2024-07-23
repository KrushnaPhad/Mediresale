<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>


<style>
    .input-group-text
    {
        background: #213367 !important;
    }

    .page-titles h4
    {
        color: #213367 !important;
    }

    .card-title
    {
        color: #213367 !important;
    }

    </style>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Property</h4>
                            <ol class="breadcrumb pt-1">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active "><a href="javascript:void(0)">Add Property</a></li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    
                    </div>
                </div>
                <!-- row -->
                <form id="propertyForm" method="POST" enctype="multipart/form-data">
                <div class="row">
              
                    <div class="col-xl-6 col-xxl-12">


                       <!-- title -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Name</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                          
                                        </div>
                                    
                                </div>
                            </div>
                        
                      <!-- title -->
                      <!-- Description -->
                      
                            <div class="card-header">
                                <h4 class="card-title">Description</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <textarea id="editor1" name="description"></textarea></textarea>
                                            </div>
                                          
                                        </div>
                                    
                                </div>
                            </div>
                     
                      <!-- Description -->
                      </div>
                    </div>

                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                         <!-- serial number -->
                         <div class="card-header">
                                <h4 class="card-title">State</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <select name="state" id="state" onchange="fetchCityData(this.value)">
                                                    <option value="">Select State</option>
                                                    <?php foreach ($states as $state) { ?>

                                                        <option value="<?php echo $state->id ?>"><?php echo $state->name ?></option>

                                                    <?php }?>
                                                </select>
                                            </div>
                                          
                                        </div>
                                    
                                </div>
                            </div>

                            <!-- serial number -->


                        

                              <!-- price  -->
                            <div class="card-header">
                                <h4 class="card-title">City</h4>
                            </div>
                            
                            <div class="card-body">
                            
                                <div class="basic-form">
                                    
                                
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <select name="city" id="cityId" >
                                                    <option value="">Select City</option>
                                                    
                                                </select>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                
                                                <input type="text" class="form-control" name="zipcode" placeholder="Zip Code">
                                            </div>
                                          
                                        </div>
                                    
                                </div>
                            </div>
                            <!-- price  -->

                           <!-- adress div -->
                            <div class="card-header">
                                <h4 class="card-title">Adress</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="address" placeholder="Address">
                                            </div>
                                          
                                        </div>
                                    
                                </div>
                            </div>
                             <!-- adress div end -->

                             <!-- built year and total are div -->
                             <div class="card-header">
                                <h4 class="card-title">Built Year</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="built_year" placeholder="Built Year">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="total_area" placeholder="Total Area">
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <!-- built year and total are div end -->
                              <!-- built year and total are div -->
                              <div class="card-header">
                                <h4 class="card-title">Price</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="price" placeholder="Price">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="parking" placeholder="Parking">
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <!-- built year and total are div end -->

                             <!-- Image Preview Section -->
                             <div id="imagePreview" class="row"></div>
                           
                           <div class="card-header">
                               <h4 class="card-title">Image</h4>
                           </div>
                           <div class="card-body">
                               <div class="basic-form custom_file_input">
                       
                                       <div class="input-group mb-3">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text">Upload</span>
                                           </div>
                                           <div class="custom-file">
                                               <input type="file" accept="image/*,.pdf" name="equipment_image[]" id="equipment_image" class="custom-file-input" multiple>
                                               <label class="custom-file-label">Choose file</label>
                                           </div>
                                       </div>

                               </div>
                           </div>
                           <!-- image -->
                           
                            
                            
                    </div>

                    <div class="col-xl-12 col-xxl-12 text-right mt-2">
                            <button type="submit" class="btn btn-blue"><i class="fa fa-plus color-info mr-1"></i>Add Property </button>
                    </div>
                </div>

               
            </div>
            </form>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        

        
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
        <script src="https://dds.doodlodesign.com/assets/vendor/tinymce/tinymce.min.js"></script>
        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Initialize Summernote -->
<!-- Initialize TinyMCE -->
<script>
tinymce.init({
  selector: 'textarea'
});
</script>


<!-- image -->

<script>
document.getElementById('equipment_image').addEventListener('change', function(event) {
    var input = event.target;
    var previewDiv = document.getElementById('imagePreview');
    
    // Clear the previous previews
    previewDiv.innerHTML = '';

    for (var i = 0; i < input.files.length; i++) {
        var file = input.files[i];

        if (file.type.startsWith('image/')) {
            var reader = new FileReader();

            reader.onload = (function(f) {
                return function(e) {
                    var previewContainer = document.createElement('div');
                    previewContainer.className = 'col-md-3 position-relative';

                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail';
                    img.style.maxWidth = '150px';
                    img.style.margin = '10px';

                    var deleteIcon = document.createElement('span');
                    deleteIcon.className = 'position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger';
                    deleteIcon.style.cursor = 'pointer';
                    deleteIcon.style.right = '0px';
                    deleteIcon.style.top = '5px';
                    deleteIcon.innerHTML = '<i class="fa fa-times"></i>';

                    deleteIcon.onclick = function() {
                        previewDiv.removeChild(previewContainer);
                        // Remove the file from the input element
                        var dt = new DataTransfer();
                        for (var j = 0; j < input.files.length; j++) {
                            if (input.files[j] !== f) {
                                dt.items.add(input.files[j]);
                            }
                        }
                        input.files = dt.files;
                    };

                    previewContainer.appendChild(img);
                    previewContainer.appendChild(deleteIcon);
                    previewDiv.appendChild(previewContainer);
                };
            })(file);

            reader.readAsDataURL(file);
        }
    }
});
</script>

<!-- image script -->


<!-- add equipments -->
<script>
    $(document).ready(function() {
        $('#propertyForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?php echo base_url('property/add_property') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then((result) => {
                            if (result.isConfirmed) {

                                 // Clear the form fields
                            $('#propertyForm')[0].reset();
                                //redirect  the page
                                window.location.href = 'property/add_property';
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred: ' + xhr.responseText,
                    });
                }
            });
        });
    });
</script>

<!-- scritp for sate and city data  -->
        <script>
            function fetchCityData(statesId){
                $.ajax({
                    url: "<?php echo site_url("cities") ?> ",
                    method: "POST",
                    data: {
                        statesId:statesId
                    },
                    success: function(result){
                    let data = JSON.parse(result);

                    document.querySelector("#cityId").innerHTML = data;
                        console.log(result);
                    }
                });
            }
        </script>
<!-- scritp for sate and city data  -->

       
<?= $this->endSection() ?>