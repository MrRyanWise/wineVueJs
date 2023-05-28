<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Vin</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./Assets/style/index.css" />  

</head>
<body>  
<div id="container" style="background:#B01735;">

    <nav>
        <div>
            <a href="">
            <img id="logo" src="./assets/img/logo.jpg" alt="logo" />
            </a>
        </div>
        <ul>
            <li>
            <a href="">
                <i class="fas fa-sign-in-alt"></i>
            </a>
            </li>
        </ul>
    </nav>

 
        <div id="app" class="lobby-container">
            <div @click="cancelSearch" v-if="searchKey || countrySelected || grapesSelected" class="cancel">
                <h5>Annuler recherche</h5>
                <i class="fas fa-times"></i>
            </div>

            <ul>
                <li v-on:click="searchInput('name')" class="name">
                <i class="fas fa-search"></i>
                <input v-if="inputType == 'name' " v-model="searchKey" type="search" class="search" placeholder="Entrez le nom d'un vin...">
               </li>
      
                <li v-on:click="searchInput('country')" class="country">
                    <i class="fas fa-globe-europe"></i>
                        <select v-show="inputType == 'country' " v-model="countrySelected" >
                            <option value="">Choisissez un pays </option>
                            <option v-for="option in countryOption"  :key="option" :value="option">{{ option }} </option>
                        </select>
                </li>

                <li v-on:click="searchInput('grapes')" class="grapes">
                    <i class="fas fa-wine-glass-alt"></i>
                        <div v-if="inputType == 'grapes' " class="radio-container">
                            <div v-for="grape in grapresRadio" class="radio">
                                <label :for="grape.name"> {{ grape.name }} </label>
                                <input v-model="grapesSelected" :id="grape.name" :value="grape.name" type="radio" class="radio-button" />
                            </div>
                        </div>
                </li>   
            </ul>
            <span v-if="search.length != 0 && inputType != '' " style="position: absolute; top: 240px; right: 700px; font-size: 25px;"  >
            {{ search.length }} resultat<span v-if="search.length >1" >s</span>
            </span>  
              
            <h1 v-if="inputType == '' " class="title">Liste des Vins</h1>
            <h3 v-if="search.length == 0">Aucun Résultat</h3>
         
            <transition-group name="item-anim" tag="div"  class="list-container">
                <div v-for="row , id in search"  :key="id" class="wine-list">
                    <div class="wine-card">
                        <div class="wine-header">
                            <h2 style="color:black; font-size: 30px;">{{ row.name }}</h2> 
                                <i @click="removeItem(id)" style="color:white;position: absolute;top: 20px; right: 50px;  font-size: 25px;"  class="fas fa-times"></i>
                        </div>

                        <div class="container">
                            <div class="text-container">
                                <div class="buttons">
                                    <h4> {{ row.year }} </h4>
                                    <h4> {{ row.country }} </h4>
                                    <h4> {{ row.grapes }} </h4>
                                </div>
                                <div class="location">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <!-- <i class="fas fa-map-market-alt"></i> -->
                                <span>{{ row.region }} </span>
                                </div>
                                <p>{{ row.description}}</p>
                            </div>
                            <img :src="getImgUrl(row.picture)" alt=""/>
                        </div>
                    
                    </div>
                </div>
            </transition-group>
        </div> 
</div>
      <script src="./Js/vue.js"></script>  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.46/vue.cjs.js" integrity="sha512-I+vKRHU/bbkhFO5eb+UQhyNK3A2KQBwumzMJESBYuTzcCC7bOf2OS9dyNmdm+pqxDK8DjgaT3i2WPSSsNxXacw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.7.10/dist/vue.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
</body>
</html>