<template>
 
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" @submit.prevent="submit">
                    <h2 class="text-center hidden">Create New Account</h2>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" v-model="userData.name" />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" v-model="userData.email" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" v-model="userData.password" />
                    </div>

                    <input type="submit" class="btn btn-primary btn-block" value="Register" />
                </form>
            </div>
        </div>

</template>

<script>

export default {
    name: "Register",
    components: {
    },
    props: ["userData","userRole"],
    setup(props,{ emit }) {
        function submit() {
            emit('submitCreate', props.userData)
        }
        return {
            submit
        }
    }
}
</script>
