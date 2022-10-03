<div class="jjournal bg">

    <nav class="navbar navbar-expand-lg" style="margin-top: 100px;">
   <!-- <h3 class="card-title" style="margin:0 150px 0 350px;">Journal</h3> -->
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" style="padding-left: 190px;">
                    <input class="form-control me-2" id = "searchTxt" type="search" placeholder="Search Journal Entry" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit" style="margin-left: 10px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="card">
            <div class="card-body" >
                <h4 class="card-title" style="color:#ff3b72;">Write Entry ✏️</h4>
                <p class="card-text">What's on your mind today? 💭</p>
                <div class="mb-3">

                    <textarea class="form-control" id="addTxt" rows="3"></textarea>
                </div>
                <a href="#" class="btn-primary" id="addBtn" 
                style="padding:10px;font-size:15px;border-radius: 20px;">Add Entry</a>
            </div>
        </div>
        <hr>
        <h5 style="color:#ff3b72;margin-left: 15px;">Your Entries 📝</h5>
        
        <div id="entries" class="row container-fluid" >
                 
        </div>


    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->

</div>