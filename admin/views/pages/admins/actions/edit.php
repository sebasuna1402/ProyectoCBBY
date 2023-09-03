<?php 
	
	if(isset($routesArray[3])){
 
    $select = "id_user,displayname_user,username_user,email_user,country_user,city_user,address_user,phone_user";

       $url = "users?select=".$select."&linkTo=id_user&equalTo=".$routesArray[3];
       $method = "GET";
       $fields = array();

       $response = CurlController::request($url,$method,$fields);
     

        if ($response->status == 200) {
            
            $admin = $response->results[0];

        }else{

            echo '<script>

            window.location = "/admins";

            </script>';

        }



    }


?>




<div class="card card-dark card-outline">

    <form method="post" class="needs-validation" novalidate novalidate enctype="multipart/form-data">


    <input type="hidden" value="<?php echo $admin->id_user ?>" name="idAdmin">

        <div class="card-header">
           
           <?php

          require_once "controllers/admins.controller.php";   

          $create = new AdminsController();
          $create -> edit($admin->id_user);

            ?>


            <div class="col-md-8 offset-md-2">




                <div class="form-group mt-2">

                    <label>Nombre</label>

                    <input 
                    type="text" 
                    class="form-control"
                    pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}"
                    onchange="validateJS(event,'text')"
                    name="displayname"
                    value="<?php echo $admin->displayname_user ?>"
                    required>

                                
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                </div>


                <div class="form-group mt-2">
					
					<label>Username</label>

					<input 
					type="text" 
					class="form-control"
					pattern="[A-Za-z0-9]{1,}"
					onchange="validateRepeat(event,'t&n','users','username_user')"
					name="username"
                    value="<?php echo $admin->username_user ?>"
					required>

					<div class="valid-feedback">Valid.</div>
            		<div class="invalid-feedback">Please fill out this field.</div>

				</div>

				<!--=====================================
                Correo electrónico
                ======================================-->

				<div class="form-group mt-2">
					
					<label>Email</label>

					<input 
					type="email" 
					class="form-control"
					pattern="[.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}"
					onchange="validateRepeat(event,'email','users','email_user')"
					name="email"
                    value="<?php echo $admin->email_user ?>"
					required>

					<div class="valid-feedback">Valid.</div>
            		<div class="invalid-feedback">Please fill out this field.</div>

				</div>




                <div class="form-group mt-2">
					
					<label>Password</label>

					<input 
					type="password" 
					class="form-control"
                    autocomplete="off"
					pattern="[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}"
					onchange="validateJS(event,'pass')"
					name="password"
                    placeholder="*******"
		
					>

					<div class="valid-feedback">Valid.</div>
            		<div class="invalid-feedback">Please fill out this field.</div>

				</div>



                <div class="form-group my-2">

                 <label>Pais</label>


                 <?php

                 $countries = file_get_contents("views/assets/json/countries.json");
                 $countries = json_decode($countries, true);
        
                 
                 ?>
                    <select class="form-control select2 changeCountry" name="country" required>


                	<option value="<?php echo $admin->country_user?>_<?php echo explode("_",$admin->phone_user)[0] ?>"><?php echo $admin->country_user ?></option>

                    <?php foreach ($countries as $key => $value): ?>
                        <option value="<?php echo $value["name"]?>_<?php echo $value["dial_code"]?>"><?php echo $value["name"]?> </option>

                     <?php endforeach  ?>    




                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>



                  </div>

                  <div class="form-group mt-2">

                <label>Ciudad</label>

                <input 
                type="text" 
                class="form-control"
                pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}"
                onchange="validateJS(event,'text')"
                name="city"
                value="<?php echo $admin->city_user ?>"
                required
                >
                <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                </div>



                
                <div class="form-group mt-2">

                <label>Direccion</label>

                <input type="text" 
                class="form-control"
                pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                onchange="validateJS(event,'regex')"
                name="address"
                value="<?php echo $admin->address_user ?>"
                required
                >
                <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                </div>



                <div class="form-group mt-2 mt-5">

                <label>Telefono</label>
                <div class="input-group">
                
                <div class="input-group-append">
				<span class="input-group-text dialCode"><?php echo explode("_",$admin->phone_user)[0] ?></span>
				</div>

                <input 
                type="text"
                class="form-control"
                pattern="[-\\(\\)\\0-9 ]{1,}"
                onchange="validateJS(event,'phone')"
                name="phone"
                value="<?php echo $admin->phone_user ? explode("_",$admin->phone_user)[1] : null ?>"
                required>
                </div>
                 <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>








            </div>



        </div>

        <div class="card-footer">

            <div class="col-md-8 offset-md-2">



                <div class="form-group mt-3">

                    <a href="/admins" class="btn btn-light border text-left ">Regresar</a>

                    <button type="submit" class="btn bg-dark float-right"> Guardar</button>

                </div>

            </div>


        </div>



    </form>


</div>