define({ "api": [
  {
    "type": "get",
    "url": "/control",
    "title": "showControl",
    "group": "Control",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "courses",
            "description": "<p>Get all courses info</p>"
          },
          {
            "group": "Success 200",
            "optional": false,
            "field": "cousre_feild",
            "description": "<p>Get courses table feild name</p>"
          },
          {
            "group": "Success 200",
            "optional": false,
            "field": "category",
            "description": "<p>Get all category info</p>"
          },
          {
            "group": "Success 200",
            "optional": false,
            "field": "category_feild",
            "description": "<p>Get category table feild name</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "GetControl"
  },
  {
    "type": "get",
    "url": "/delete_manager_account/{manager}",
    "title": "deleteManager",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "manager",
            "description": "<p>object array contain manager id to delete</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "manager",
            "description": "<p>delete manager</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "GetDelete_manager_accountManager"
  },
  {
    "type": "get",
    "url": "/delete_student_account/{student}",
    "title": "deleteStudent",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "student",
            "description": "<p>object array contain student id to delete</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "student",
            "description": "<p>delete student</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "GetDelete_student_accountStudent"
  },
  {
    "type": "get",
    "url": "/deleteCategory/{cat_id}",
    "title": "deleteCategory",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "cat_id",
            "description": "<p>object array contain category id to delete</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "cat_id",
            "description": "<p>delete category</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "GetDeletecategoryCat_id"
  },
  {
    "type": "get",
    "url": "/deleteCourse/{course_id}",
    "title": "deleteCourse",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "course_id",
            "description": "<p>object array contain course id to delete</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "course_id",
            "description": "<p>delete course</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "GetDeletecourseCourse_id"
  },
  {
    "type": "get",
    "url": "/show_student",
    "title": "showStudent",
    "group": "Control",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "all_student",
            "description": "<p>show all student info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "GetShow_student"
  },
  {
    "type": "post",
    "url": "/add_manager/{role}/{user}",
    "title": "addManager",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "role",
            "description": "<p>object array contain role id</p>"
          },
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "user",
            "description": "<p>object array contain user id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "user",
            "description": "<p>update user role</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "PostAdd_managerRoleUser"
  },
  {
    "type": "post",
    "url": "/createCategory",
    "title": "createCategory",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of  category info</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "success 200": [
          {
            "group": "success 200",
            "optional": false,
            "field": "category",
            "description": "<p>Add category</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "PostCreatecategory"
  },
  {
    "type": "post",
    "url": "/createCourse",
    "title": "createCourse",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of course info</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "success 200": [
          {
            "group": "success 200",
            "optional": false,
            "field": "course",
            "description": "<p>Add course  with image &amp; files</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "PostCreatecourse"
  },
  {
    "type": "post",
    "url": "/edit_profile/{id}",
    "title": "editProfile",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of user profile updating info</p>"
          },
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "id",
            "description": "<p>array contain user id &amp; field to update</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "id",
            "description": "<p>updating user info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "PostEdit_profileId"
  },
  {
    "type": "post",
    "url": "/editCategory",
    "title": "editCategory",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of category updating info</p>"
          },
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "cat_id",
            "description": "<p>array of category id &amp; feild to update</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "cat_id",
            "description": "<p>updating category info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "PostEditcategory"
  },
  {
    "type": "post",
    "url": "/editCourse",
    "title": "editCourse",
    "group": "Control",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of course updating info</p>"
          },
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "course_id",
            "description": "<p>array contain course id &amp; feild to update</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "course_id",
            "description": "<p>updating course info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ControlController.php",
    "groupTitle": "Control",
    "name": "PostEditcourse"
  },
  {
    "type": "get",
    "url": "/course_category",
    "title": "courseCategory",
    "group": "CourseCategory",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "category",
            "description": "<p>get all category info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CourseCategoryController.php",
    "groupTitle": "CourseCategory",
    "name": "GetCourse_category"
  },
  {
    "type": "get",
    "url": "/course",
    "title": "course",
    "group": "Course",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "course",
            "description": "<p>get all course info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CourseController.php",
    "groupTitle": "Course",
    "name": "GetCourse"
  },
  {
    "type": "get",
    "url": "/course/{course_id}",
    "title": "oneCourse",
    "group": "Course",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "course_id",
            "description": "<p>course id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "one_course",
            "description": "<p>get a specifec course info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CourseController.php",
    "groupTitle": "Course",
    "name": "GetCourseCourse_id"
  },
  {
    "type": "get",
    "url": "/delete_Form/{form_id}",
    "title": "deleteForm",
    "group": "Formregister",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "form_id",
            "description": "<p>object array contain form id to delete</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "form_id",
            "description": "<p>delete form</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FormregisterController.php",
    "groupTitle": "Formregister",
    "name": "GetDelete_formForm_id"
  },
  {
    "type": "get",
    "url": "/delete_Form_template/{form_template_id}",
    "title": "deleteCourse",
    "group": "Formregister",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "form_template_id",
            "description": "<p>object array contain form template id to delete</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "form_template_id",
            "description": "<p>delete form template</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FormregisterController.php",
    "groupTitle": "Formregister",
    "name": "GetDelete_form_templateForm_template_id"
  },
  {
    "type": "get",
    "url": "/show_form",
    "title": "showForm",
    "group": "Formregister",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "all_form",
            "description": "<p>show all form template info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FormregisterController.php",
    "groupTitle": "Formregister",
    "name": "GetShow_form"
  },
  {
    "type": "post",
    "url": "/add_form/{course}",
    "title": "addForm",
    "group": "Formregister",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of form info</p>"
          },
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "course",
            "description": "<p>course id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "form",
            "description": "<p>add form to specific course</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FormregisterController.php",
    "groupTitle": "Formregister",
    "name": "PostAdd_formCourse"
  },
  {
    "type": "post",
    "url": "/edit_register_form/{form_template_id}",
    "title": "editForm",
    "group": "Formregister",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of form template updating info</p>"
          },
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "form_template_id",
            "description": "<p>array contain form template id &amp; field to update</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "form_template_id",
            "description": "<p>updating form template info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FormregisterController.php",
    "groupTitle": "Formregister",
    "name": "PostEdit_register_formForm_template_id"
  },
  {
    "type": "post",
    "url": "/register_form/{form_id}",
    "title": "registerForm",
    "group": "Formregister",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of registerform info</p>"
          },
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "form_id",
            "description": "<p>form id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "form_template",
            "description": "<p>register form template for student of specific course</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FormregisterController.php",
    "groupTitle": "Formregister",
    "name": "PostRegister_formForm_id"
  },
  {
    "type": "get",
    "url": "/home",
    "title": "index",
    "group": "Home",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "return",
            "description": "<p>home view</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/HomeController.php",
    "groupTitle": "Home",
    "name": "GetHome"
  },
  {
    "type": "post",
    "url": "user/login",
    "title": "login",
    "group": "Login",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of login input values</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "token",
            "description": "<p>login successfuly</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/APILoginController.php",
    "groupTitle": "Login",
    "name": "PostUserLogin"
  },
  {
    "type": "get",
    "url": "/new_course",
    "title": "newCourse",
    "group": "NewCourse",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "courses",
            "description": "<p>get new course info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/NewCourseController.php",
    "groupTitle": "NewCourse",
    "name": "GetNew_course"
  },
  {
    "type": "get",
    "url": "/profile",
    "title": "profile",
    "group": "Profile",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "id",
            "description": "<p>return logged in user info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ProfileController.php",
    "groupTitle": "Profile",
    "name": "GetProfile"
  },
  {
    "type": "post",
    "url": "update-my-profile/{user_id}",
    "title": "updateProfile",
    "group": "Profile",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of logged in user profile updating info</p>"
          },
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "user_id",
            "description": "<p>array contain user id &amp; field to update</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "user_id",
            "description": "<p>updating profile info</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ProfileController.php",
    "groupTitle": "Profile",
    "name": "PostUpdateMyProfileUser_id"
  },
  {
    "type": "post",
    "url": "user/register",
    "title": "register",
    "group": "Register",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "object",
            "optional": false,
            "field": "request",
            "description": "<p>object array of register input values</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "token",
            "description": "<p>Register user with authorization</p>"
          },
          {
            "group": "Success 200",
            "optional": false,
            "field": "response",
            "description": "<p>get all user info for register</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/APIRegisterController.php",
    "groupTitle": "Register",
    "name": "PostUserRegister"
  }
] });
