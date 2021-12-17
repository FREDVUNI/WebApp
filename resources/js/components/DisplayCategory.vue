<template>
    <div class="w-100 mt-5 container">
        <div class="row">
            <div class="col-12">
                <div class="w-100 align-items-center py-1 categorybox" @click="Allcategories()">
                    <h5 class="text-center">show all categories</h5>
                </div>
            <div class="row">
                <div class="p-2 col-sm-4 col-4" v-for="category in categories" :key="category.id" @click="subcat(category.id)">
                <div class="w-100 align-items-center py-1 categorybox">
                    <h5 class="text-center">{{ category.category }}</h5>
                </div>
            </div>
            </div>
            <div class="mt-5">
                <div class="row">
                    <div class="p-2 col-sm-6 col-lg-4" v-for="subcategory in subcategoryFilter" :key="subcategory.id">
                     <div class="w-100 align-items-center py-1 categorybox" @click="selectedcat(subcategory.id)">
                        <h6 class="text-center">{{ subcategory.subcategory }}</h6>
                    </div>
                </div>
                </div>
            </div>
            <div class="mt-5">
                 
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default{
        props:["categories","subcategories","domains"],
        data(){
            return{
                selectedcategory: '',
                selectedsubcategory : '',
            }
        },
        methods:{
            subcat(id){
                this.selectedcategory = id;
                this.selectedsubcategory='';
            },
            selectedcat(id){
                this.selectedsubcategory = id;
            },
            Allcategories(){
                this.selectedsubcategory='';
                this.selectedcategory='';
            }
        },
        computed:{
            subcategoryFilter(){
                return this.subcategories.filter((item) => item.category_id == this.selectedcategory);
            },
            filteredDomains(){
                if(this.selectedsubcategory === "" && this.selectedcategory === ""){
                    return this.domains
                }else if(this.selectedsubcategory != "" && this.selectedcategory === ""){
                    return this.domains.filter((item)=>item.subcategory_id == this.selectedsubcategory);
                }else if(this.selectedcategory != "" && this.selectedsubcategory === ""){
                    return this.domains.filter((item)=>item.category_id == this.selectedcategory);
                }else if(this.selectedcategory != "" && this.selectedsubcategory != ""){
                    return this.domains.filter((item)=>item.subcategory_id == this.selectedsubcategory);
                }
            }
        },
    }
</script>
