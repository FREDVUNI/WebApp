<template>
    <div>
        <div class="mt-2">
            <div class="alert alert-success" v-show="success">Domain has been saved.</div>
        </div>
       <form method="post" @submit.prevent="submitdomain()" enctype="multipart/form-data">
           <div class="form-group">
               <label for="category">Choose category</label>
               <select id="category" :class="{'is-invalid': form.errors.has('category_id')}" class="form-control" v-model="form.category_id">
                   <option v-for='category in this.categories' :key='category.id' :value="category.id">{{category.category}}</option>
               </select>
               <span class="invalid-feedback" v-show="form.errors.has('category_id')" v-text="form.errors.get('category_id')"></span>
           </div>  
           <div class="form-group">
               <label for="subcategory">Choose subcategory <span class="text-muted">(optional)</span></label>
               <select id="subcategory" class="form-control" v-model="form.subcategory_id">
                   <option value="">choose a subcategory</option>
                    <option v-for='subcategory in this.subcategoriesFilter' :key='subcategory.id' :value="subcategory.id">{{subcategory.subcategory}}</option>
               </select>
           </div>
           <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" :class="{'is-invalid': form.errors.has('email')}" v-model="form.email" @keydown="form.errors.clear('email')" class="form-control" placeholder="Enter email address">
                <span class="invalid-feedback" v-show="form.errors.has('email')" v-text="form.errors.get('email')"></span>
            </div>
            <div class="form-group col-md-6">
                <label for="url">URL</label>
                <input type="url" :class="{'is-invalid': form.errors.has('url')}" class="form-control" placeholder="Enter URL" v-model="form.url" @keydown="form.errors.clear('url')" >
                <span class="invalid-feedback" v-show="form.errors.has('url')" v-text="form.errors.get('url')"></span>
            </div>
            <div class="input-group ml-2 mb-3">
                <input type="file" id="img">
            </div>
           </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">Domain Title</label>
                <input type="text" :class="{'is-invalid':form.errors.has('title')}" class="form-control" placeholder="Enter domain title" v-model="form.title" @keydown="form.errors.clear('title')" >
                <span class="invalid-feedback" v-show="form.errors.has('title')" v-text="form.errors.get('title')"></span>
            </div> 
            <div class="form-group col-md-6">
                <label for="short">Short Description</label>
                <input type="text" id="" :class="{'is-invalid':form.errors.has('shortdescription')}" class="form-control" placeholder="Enter short description " v-model="form.shortdescription" @keydown="form.errors.clear('shortdescription')" >
                <span class="invalid-feedback" v-show="form.errors.has('shortdescription')" v-text="form.errors.get('shortdescription')"></span>
            </div>
           </div>
           <div class="form-group">
                <label for="decription">Description</label>
                <textarea cols="30" :class="{'is-invalid': form.errors.has('description')}" rows="10" class="form-control" placeholder="Enter a brief description about the domain." v-model="form.description" @keydown="form.errors.clear('description')"></textarea>
                <span class="invalid-feedback" v-show="form.errors.has('description')" v-text="form.errors.get('description')"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Submit Domain</button>
            </div>
       </form>  
    </div>
</template>
<script>
export default {
    name: 'register-domain',
    props:['categories','subcategories'],
    data () {
        return {
           form: new Form({
               'email':'',
               'url':'',
               'title':'',
               'shortdescription':'',
               'description':'',
               'category_id':1,
               'subcategory_id':'',
           }),
            success:false,
        }
    },
    methods:{
        submitdomain(){
            let data = new FormData();
            data.append('category_id',this.form.category_id) 
            data.append('subcategory_id',this.form.subcategory_id) 
            data.append('email',this.form.email) 
            data.append('url',this.form.url) 
            data.append('title',this.form.title) 
            data.append('shortdescription',this.form.shortdescription) 
            data.append('description',this.form.description)
             
            if(document.getElementById('img').files[0]){
                data.append('img',document.getElementById('img').files[0])
            }            
            axios.post('/domain',data)
            
            .then( (response) =>{
                this.form.reset();
                this.form.category_id = 1
                document.getElementById('img').files[0] = ""
                this.success = true;
            })
            .catch(error=>{
                this.form.errors.record(error.response.data)
            })
        }
    },
    computed:{
        subcategoriesFilter(){
            return this.subcategories.filter((item) => item.category_id == this.form.category_id)
        }
    },
}
</script>

<script>
export default {
    data(){
        return{
            form: new Form({
                "category":""
            })
            // success: false
        }
    },
    methods:{
        submitDomain(){
            let data = new FormData()
            data.apppend("category",this.form.category)

            axios.post("/domain",data)
            .then(resp=>{
                this.form.reset()
                this.success = true
            })
            .catch(error=>{
                this.form.errors.record(error.response.data)
            })
        }
    }
}
</script>