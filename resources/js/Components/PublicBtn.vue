<script>
export default{
    props:{
        bgColor:{
            type:String, 
            default: 'bg-blue-500',
        },
        content:{
            type:String,
            default:'',
        }
    },
}
</script>

<template>
    <button :class="bgColor" class=" text-white p-2 m-2 rounded-md">{{ content }}</button>
</template>