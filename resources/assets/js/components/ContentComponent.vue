<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">内容组件</div>

                    <div class="panel-body">
                       {{ content.context }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            content:{
                type:Object,
                default:null
            }
        },
        data:function(){
          return {
              content:null
          }
        },
        mounted() {
        },
    }
</script>
