 //js_fetchdata.js
 var application = new Vue({
    el:'#app',
        data:{
            inputType : "",
            allData: [], 
            searchKey : "",
            countryList :[ "Espagne","France","Italie","USA"],

            countryOption : [ "Espagne","France","Italie","USA"],
            countrySelected: "",
            grapresRadio: [
                {name : "pinot Noir"},
                {name : "Sauvignon"},
                {name : "Merlot"},
                {name : "Chardonnay"},
            ],
            grapesSelected: ""
    },
    computed : {
        search() {
            return this.allData.filter((wine) => {
                return (
                    wine.name.toLowerCase().includes(this.searchKey.toLowerCase())
                    &&
                    wine.country.toLowerCase().includes(this.countrySelected.toLowerCase())
                    &&
                    wine.grapes.toLowerCase().includes(this.grapesSelected.toLowerCase())
                )
            })
        },
        Remplissage(){
            for(let i = 0; i<= this.allData.length; i++){
                if(!this.countryList.includes(this.allData[i])){
                    this.countryList.push(this.allData[i].country)
                }
            } 
        }, 
    },
    methods:{
        //retourne des objets
        fetchAllData:function(){ //show records
            axios.post('./PHP/DataRequest/fetchall.php', {
                action:'fetchall'
               }).then(function(response){
                application.allData = response.data;
               })
        },
        removeItem(id){
            this.$delete(this.allData, id);
        },
        getImgUrl(pic){
            return "assets/uploads/" + pic;
        },
        searchInput(param) {
            this.inputType = param;
        },
        cancelSearch() {
            this.searchKey = "";
            this.countrySelected = "";
            this.grapesSelected = "";
        }
    
    }, 
    created:function(){     
        this.fetchAllData(); 
    }, 
    /*mounted() {
        setTimeout(() =>{ 
            let arr = this.countryList.sort();
            for( let i = 0; i < arr.length; i++){
                this.countryOption.push({
                    name : arr[i],
                    id : arr[i]
                })
            }
        },500); 
    }*/
});