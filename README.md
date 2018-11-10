# Fixtudy API V1
API for project fixtudy
KSM Android UPN Veteran Jakarta


### Authentication

#### Login
POST : /api/v1/auth/login.php _@form-data: email_user, password_user_

#### Register
POST : /api/v1/auth/register.php _@form-data : email_user, name, password_user_

### Class

#### Create Class
POST : /api/v1/class/create-class.php 
_@form-data : class_name, class_loc, class_date, class_time, class_desc, class_payment, quota_
_@param : id_user_

#### View available class
GET : /api/v1/class/view-available-class.php _@param : id_user_

#### View my class
GET : /api/v1/class/view-myclass.php _@param : id_user_

#### Delete my class
POST : /api/v1/class/delete-myclass.php _@param : id_user, id_class_

#### Join Class
POSTPOST : /api/v1/class/join-class.php _@form-data : id_user, id_class_

#### Cancle Class
POST : /api/v1/class/cancle-class.php _@form-data : id_attendies, id_user_

#### Attendies
POST : /api/v1/class/attendies.php _@form-data : id_class_
