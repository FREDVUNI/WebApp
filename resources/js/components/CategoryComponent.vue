<template>
    <div>
        <div v-for="category in categories" :key="category.id">
            <h4>{{ category.category }}</h4>
            <ul>
                <li v-for="subcat in category.subcategories" :key="subcat.id">{{ subcat.subcategory }}</li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    props:['categories'],
    name: 'category-component',
    data () {
        return {
            
        }
    }
}
</script>