window.gapi.load("auth2", function () {
  window.gapi.auth2.init({
    client_id:
      "275425397057-b48dlqo8hpkhcec4efqr7sdira25v3ae.apps.googleusercontent.com",
  });
});
$(document).ready(() => {
  const createConfigObject = (
    signIn,
    signUp,
    switcher,
    userNameField,
    userCompanyNameField,
    userEmailField,
    passwordField,
    rememberMeField,
    submitSignInButton,
    submitSignUpButton,
    facebookButton,
    googleButton,
    betweenButtonsText,
    userInitials,
    userUNP,
    userPhoneNumber,
    userAddress,
    userAccount
  ) => ({
    signIn,
    signUp,
    switcher,
    userNameField,
    userCompanyNameField,
    userEmailField,
    passwordField,
    rememberMeField,
    submitSignInButton,
    submitSignUpButton,
    facebookButton,
    googleButton,
    betweenButtonsText,
    userInitials,
    userUNP,
    userPhoneNumber,
    userAddress,
    userAccount,
  });
  const languageConfig = {
    rus: createConfigObject(
      "Логин",
      "Регистрация",
      "рус",
      "Имя пользователя",
      "Название компании",
      "Ваша почта",
      "Пароль",
      "Запомнить меня",
      "Войти",
      "Зарегистрироваться",
      "Войти через Facebook",
      "Войти через Google",
      "или",
      "Ваши ФИО",
      "Ваш УНП",
      "Ваш номер телефона",
      "Ваш адрес",
      "Ваш расчетный счет"
    ),
    eng: createConfigObject(
      "Sign in",
      "Sign up",
      "eng",
      "Username",
      "Company name",
      "Your mail",
      "Password",
      "Remember me",
      "Sign in",
      "Sign up",
      "Sign in with Facebook",
      "Sign in with Google",
      "or",
      "Your full name",
      "Your UNP",
      "Your phone number",
      "Your address",
      "Your current account"
    ),
  };
  const updateLanguage = (lang) => {
    updateButtonsHandler();
    $("#signInButton").text(languageConfig[lang].signIn);
    $("#signUpButton").text(languageConfig[lang].signUp);
    $(".switch__label").text(languageConfig[lang].switcher);
    if (isSignIn) {
      $("#loginID").attr("placeholder", languageConfig[lang].userNameField);
      $("#loginPassword").attr(
        "placeholder",
        languageConfig[lang].passwordField
      );
      $("#signFormLabel").text(languageConfig[lang].rememberMeField);
      $("#acceptSignInButton").text(languageConfig[lang].submitSignInButton);
      $("#betweenButtonsText").text(languageConfig[lang].betweenButtonsText);
      $("#facebookButton").text(languageConfig[lang].facebookButton);
      $("#googleButton").text(languageConfig[lang].googleButton);
    } else {
      $("#new_user").attr("placeholder", languageConfig[lang].userNameField);
      $("#new_email").attr("placeholder", languageConfig[lang].userEmailField);
      $("#new_company").attr(
        "placeholder",
        languageConfig[lang].userCompanyNameField
      );
      $("#new_phone").attr("placeholder", languageConfig[lang].userPhoneNumber);
      $("#new_address").attr("placeholder", languageConfig[lang].userAddress);
      $("#new_unp").attr("placeholder", languageConfig[lang].userUNP);
      $("#new_account").attr("placeholder", languageConfig[lang].userAccount);
      $("#new_initials").attr("placeholder", languageConfig[lang].userInitials);
      $("#acceptSignUpButton").text(languageConfig[lang].submitSignUpButton);
    }
  };
  const updateButtonsHandler = () => {
    $("#googleButton").click(() => {
      //data from google
      const _authOk = (user) =>
        console.log("User data", {
          id: user.getBasicProfile().getId(),
          email: user.getBasicProfile().getEmail(),
          name: user.getBasicProfile().getName(),
        });
      const _authErr = () => console.log("User closed authorization window");
      const GoogleAuth = window.gapi.auth2.getAuthInstance();
      GoogleAuth.signIn({
        scope: "profile email",
      }).then(_authOk, _authErr);
    });
    $("#facebookButton").click(() => {
      const getDataFromFB = () => {
        FB.api("/me", { fields: "name, email,id" }, function (data) {
          console.log("User data", data);
        });
      };
      FB.getLoginStatus(function (response) {
        if (response.authResponse) {
          getDataFromFB();
        } else {
          FB.login(
            function (response) {
              if (response.authResponse) {
                getDataFromFB();
              } else {
                console.log("User closed authorization window");
              }
            },
            { scope: "email" }
          );
        }
      });
    });
  };
  const createForm = (currButton, prevButton) => {
    isSignIn = !isSignIn;
    $(currButton).addClass("selected");
    $(prevButton).removeClass("selected");
    $(".sign__form-body").empty();
  };
  let language = "rus";
  let isSignIn = true;

  updateLanguage(language);

  $("#signInButton")
    .addClass("selected")
    .click(function () {
      if (!isSignIn) {
        createForm(this, "#signUpButton");
        $(".sign__form-body").append(
          '<div class="sign__form-input"><input type="text" id="loginID" /><input type="text" id="loginPassword" /></div> <div class="sign__form-checkbox"><input type="checkbox" id="rememberMe" /><label for="rememberMe" id="signFormLabel"></label></div>'
        );
        $(".sign__form-buttons")
          .empty()
          .append(
            '<button id="acceptSignInButton" class="sign__form-button"></button><p id="betweenButtonsText"></p><button id="facebookButton" class="sign__form-button"></button><button id="googleButton" class="sign__form-button"></button>'
          );
        updateLanguage(language);
      }
    });
  $("#signUpButton").click(function () {
    if (isSignIn) {
      createForm(this, "#signInButton");
      $(".sign__form-body").append(
        '<div class="sign__form-input"><input type="text" id="new_user" /><input type="text" id="new_company" /><input type="text" id="new_email" /><input type="text" id="new_phone" /><input type="text" id="new_address" /><input type="text" id="new_initials" /><input type="text" id="new_account" /><input type="text" id="new_unp" /></div>'
      );
      $(".sign__form-buttons")
        .empty()
        .append(
          '<button id="acceptSignUpButton" class="sign__form-button"></button>'
        );
      updateLanguage(language);
    }
  });

  $("#languageSwitcher").click(function () {
    if (language === "rus") {
      language = "eng";
    } else if (language === "eng") {
      language = "rus";
    }
    updateLanguage(language);
  });
});
