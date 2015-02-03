<?php

namespace app\models\users;

use dektrium\user\models\Profile as BaseProfile ;
use yii\web\UploadedFile;

class Profile extends BaseProfile
{
    /**
     * @inheritdoc
     * 
     */
    public $image;
    public function rules()
    {
         return [
            [['date_of_birth'],'date','format'=>'dd/mm/yyyy'],
            [['btech_batch'],'integer','min'=>1965,'max'=>2014],
            [['public_email', 'gravatar_email'], 'email'],
            ['website', 'url'],
            [['first_name','middle_name','last_name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
            //image upload
            [['pimage', 'image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, png','minSize'=>'1*1024','maxSize'=>'300*1024'],
            [['image'], 'image', 'extensions' => 'png, jpg',
                'minWidth' => 100, 'maxWidth' => 200,
                'minHeight' => 100, 'maxHeight' => 200,
            ],
            //eduaional details
            [['mtech_qual','mtech_university', 'phd_qual', 'phd_university',  'other_specialization'], 'string', 'max' => 255],
            [['mtech_batch','phd_batch'],'integer','min'=>1965,'max'=>2050],
            //address details
            [['p_address1','p_address2','c_address1', 'c_address2','o_address1','o_address2'], 'string', 'max' => 100],
            [['c_city','c_state','c_country','p_city', 'p_state', 'p_country','o_city', 'o_state', 'o_country'], 'string', 'max' => 30],
            [['p_pin','c_pin','o_pin'], 'string', 'max' => 10],
            [['mobile_no'], 'string', 'max' => 18],
            [['phone_no','o_phone_no','o_fax_no'], 'string', 'max' => 25],
            //professional details
            [['job_position'], 'string', 'max' => 100],
            [['job_profile'], 'string', 'max' => 255],
            [['past_job_experiences'], 'string', 'max' => 300],
        ];        
    }

    /**
     * @inheritdoc
     */
     public function attributeLabels()
    {
        return [
            'first_name' => \Yii::t('user', 'First Name'),
            'middle_name' => \Yii::t('user', 'Middle Name'),
            'last_name' => \Yii::t('user', 'Last Name'),
            'public_email' => \Yii::t('user', 'Email (public)'),
            'gravatar_email' => \Yii::t('user', 'Gravatar email'),
            'location' => \Yii::t('user', 'Location'),
            'website' => \Yii::t('user', 'Website'),
            'date_of_birth' => \Yii::t('user', 'Date of Birth'),
            'btech_batch' => \Yii::t('user', 'Btech Batch'),
            'image' => \Yii::t('user', 'Passport Image'),
            //educational details
            'mtech_qual' => \Yii::t('user', 'M.Tech Specialization'),
            'mtech_university' => \Yii::t('user', 'University'),
            'mtech_batch' => \Yii::t('user', 'Year'),
            'phd_qual' => \Yii::t('user', 'PhD Specialization'),
            'phd_university' => \Yii::t('user', 'University'),
            'phd_batch' => \Yii::t('user', 'Year'),
            'other_specialization' => \Yii::t('user', 'Other Specialization'),
            //address details
            'p_address1' => \Yii::t('user', 'Address Line 1'),
            'p_address2' => \Yii::t('user', 'Address Line 2'),
            'p_city' => \Yii::t('user', 'City'),
            'p_state' => \Yii::t('user', 'State'),
            'p_country' => \Yii::t('user', 'Country'),
            'p_pin' => \Yii::t('user', 'PIN Code'),
            'c_address1' => \Yii::t('user', 'Address Line 1'),
            'c_address2' => \Yii::t('user', 'Address Line 2'),
            'c_city' => \Yii::t('user', 'City'),
            'c_state' => \Yii::t('user', 'State'),
            'c_country' => \Yii::t('user', 'Country'),
            'c_pin' => \Yii::t('user', 'PIN Code'),
            'mobile_no' => \Yii::t('user', 'Mobile No'),
            'phone_no' => \Yii::t('user', 'Phone No'),
            //job details
            'o_address1' => \Yii::t('user', 'Address Line 1'),
            'o_address2' => \Yii::t('user', 'Address Line 2'),
            'o_city' => \Yii::t('user', 'City'),
            'o_state' => \Yii::t('user', 'State'),
            'o_country' => \Yii::t('user', 'Country'),
            'o_pin' => \Yii::t('user', 'PIN Code'),
            'o_phone_no' => \Yii::t('user', 'Phone No'),
            'o_fax_no' => \Yii::t('user', 'Phone No'),
            'job_position' => \Yii::t('user', 'Position/Designation'),
            'job_profile' => \Yii::t('user', 'Job Profile'),
            'past_job_experiences' => \Yii::t('user', 'Past Experiences(if any)'),
        ];       
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public function afterFind(){
        parent::afterFind();
        $this->date_of_birth=date('d/m/Y', strtotime(str_replace("-", "/", $this->date_of_birth)));       
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            if ($this->isAttributeChanged('gravatar_email')) {
                $this->setAttribute('gravatar_id', md5($this->getAttribute('gravatar_email')));
            }
            
            $this->date_of_birth=date('Y-m-d', strtotime(str_replace("/", "-", $this->date_of_birth)));
          
            return true;
        } else {
            return false;
        }
    }
    /**
     * fetch stored image file name with complete path 
     * @return string
     */
    public function getImageFile() 
    {
        return isset($this->pimage) ? \Yii::$app->basePath . '/web/uploads/'. $this->pimage : null;
    }
     /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() 
    {
        // return a default image placeholder if your source avatar is not found
        $pimage = isset($this->pimage) ? $this->pimage : 'default_user.jpg';
        return \Yii::$app->urlManager->baseUrl . '/uploads/'.$pimage;
    }
    /**
    * Process upload of image
    *
    * @return mixed the uploaded image instance
    */
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'image');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        //$this->img_filename = $image->name;
        $ext = end((explode(".", $image->name)));

        // generate a unique file name
        $this->pimage = $this->user_id.\Yii::$app->security->generateRandomString().".{$ext}";
        // the uploaded image instance
        return $image;
    }
     /**
    * Process deletion of image
    *
    * @return boolean the status of deletion
    */
    public function deleteImage() {
        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->pimage = null;
        //$this->img_filename = null;

        return true;
    }

   
}
