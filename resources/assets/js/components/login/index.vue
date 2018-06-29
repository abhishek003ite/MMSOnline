<template>
    <div class="login-container">
    <el-form class="login-form" autoComplete="on" :model="loginForm" :rules="loginRules" ref="loginForm" label-position="left">
      <div class="title-container">
        <!-- <h3 class="title">MMS Online</h3> -->
        <div class="login_page_wrapper">
            <div class="md-card1">
                <div class="md-card-content large-padding">
                    <div class="login_heading">
                        <div class="user_avatar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <el-form-item prop="username">
        <span class="svg-container svg-container_login">
          <!-- <svg-icon icon-class="user" /> -->
          <icon name="user"></icon>
        </span>
        <el-input name="email" type="text" v-model="loginForm.email" autoComplete="on" placeholder="username" />
      </el-form-item>

      <el-form-item prop="password">
        <span class="svg-container">
          <!-- <svg-icon icon-class="password" /> -->
          <icon name="key"></icon>
        </span>
        <el-input name="password" :type="passwordType" @keyup.enter.native="handleLogin" v-model="loginForm.password" autoComplete="on" placeholder="password" />
        <span class="show-pwd" @click="showPwd">
          <!-- <svg-icon icon-class="eye" /> -->
          <icon name="eye"></icon>
        </span>
      </el-form-item>

      <el-button type="primary" style="width:100%;margin-bottom:30px;" :loading="loading" @click.native.prevent="handleLogin">LogIn</el-button>

      <!-- <div class="tips">
        <span>{{$t('login.username')}} : admin</span>
        <span>{{$t('login.password')}} : {{$t('login.any')}}</span>
      </div>
      <div class="tips">
        <span style="margin-right:18px;">{{$t('login.username')}} : editor</span>
        <span>{{$t('login.password')}} : {{$t('login.any')}}</span>
      </div> -->

      <!-- <el-button class="thirdparty-button" type="primary" @click="showDialog=true">{{$t('login.thirdparty')}}</el-button> -->
    </el-form>

    <!-- <el-dialog :title="$t('login.thirdparty')" :visible.sync="showDialog" append-to-body>
      <! {{$t('login.thirdpartyTips')}} -->
      <!-- <br/>
      <br/>
      <br/>
      <social-sign />
    </el-dialog> -->

  </div>
</template>

<script>
import { validateEmail } from '../../utils/validate.js'
import AppStorage from '../../Helpers/AppStorage.js'
import Token from '../../Helpers/Token.js'
export default {
    name: 'login',
    data() {
        const validateEmail = (rule, value, callback) => {
            console.log(validateEmail(value))
        }
        const validatePassword = (rule, value, callback) => {
            if (value.length < 6) {
                callback(new Error('The password can not be less than 6 digits'))
            } else {
                callback()
            }
        }
        return {
            loginForm: {
                email: null,
                password: null
            },
            loginRules: {
                email: [{required: true, trigger: 'blur', validator: validateEmail}],
                password: [{required: true, trigger: 'blur', validator: validatePassword}]
            },
            passwordType: 'password',
            loading: false,
            showDialog: false
        }
    },
    created() {
        if(User.loggedIn()){
            this.$router.push({ name: 'signup' })
        }
    },
    methods: {
        showPwd() {
            if (this.passwordType === 'password') {
                this.passwordType = ''
            } else {
                this.passwordType = 'password'
            }
        },
        handleLogin() {
            this.$refs.loginForm.validate(valid => {
                if(valid) {
                    this.loading = true
                    axios.post('/api/auth/login', this.loginForm)
                    .then((res) => {
                        const access_token = res.data.access_token
                        const user = res.data.user
                        if(Token.isValid(access_token)){
                            AppStorage.store(access_token, user)
                            console.log('Hi');
                            this.$router.push({ name: 'signup' })
                        }else{
                            console.log('Hello')
                        }
                    })
                    .catch(error => console.log(error.response))
                }else{
                    console.log('Not Valid')
                    return false
                }
            })
        }
    }
}
</script>

<style rel="stylesheet/scss" lang="scss">
$bg:#2d3a4b;
$light_gray:#eee;

/* reset element-ui css */
.login-container {
  .el-input {
    display: inline-block;
    height: 47px;
    width: 85%;
    input {
      background: transparent;
      border: 0px;
      -webkit-appearance: none;
      border-radius: 0px;
      padding: 12px 5px 12px 15px;
      color: $light_gray;
      height: 47px;
      &:-webkit-autofill {
        -webkit-box-shadow: 0 0 0px 1000px $bg inset !important;
        -webkit-text-fill-color: #fff !important;
      }
    }
  }
  .el-form-item {
    border: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    color: #454545;
  }
}
</style>

<style rel="stylesheet/scss" lang="scss" scoped>
$bg:#2d3a4b;
$dark_gray:#889aa4;
$light_gray:#eee;

.login_page_wrapper {
    width: 360px;
    max-width: 100%;
    margin: 0 auto;
    transition: all 280ms cubic-bezier(.4, 0, .2, 1);
}

.login_heading {
    text-align: center;
    margin-bottom: 32px;
}

.user_avatar {
    width: 160px;
    height: 160px;
    background-image: url('../../assets/imgs/logoW.png');
    background-size: 100% 100%;
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    background-repeat: no-repeat;
}

.login-container {
  position: fixed;
  height: 100%;
  width: 100%;
  background-color: $bg;
  .login-form {
    position: absolute;
    left: 0;
    right: 0;
    width: 520px;
    padding: 35px 35px 15px 35px;
    margin: 120px auto;
  }
  .tips {
    font-size: 14px;
    color: #fff;
    margin-bottom: 10px;
    span {
      &:first-of-type {
        margin-right: 16px;
      }
    }
  }
  .svg-container {
    padding: 6px 5px 6px 15px;
    color: $dark_gray;
    vertical-align: middle;
    width: 30px;
    display: inline-block;
    &_login {
      font-size: 20px;
    }
  }
  .title-container {
    position: relative;
    .title {
      font-size: 26px;
      font-weight: 400;
      color: $light_gray;
      margin: 0px auto 40px auto;
      text-align: center;
      font-weight: bold;
    }
    .set-language {
      color: #fff;
      position: absolute;
      top: 5px;
      right: 0px;
    }
  }
  .show-pwd {
    position: absolute;
    right: 10px;
    top: 7px;
    font-size: 16px;
    color: $dark_gray;
    cursor: pointer;
    user-select: none;
  }
  .thirdparty-button {
    position: absolute;
    right: 35px;
    bottom: 28px;
  }
}
</style>
