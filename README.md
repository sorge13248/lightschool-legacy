# [LightSchool](https://lightschool.francescosorge.com/ "LightSchool homepage") — Your learning mate
LightSchool is a powerful, customizable and very easy to use web app that aims to provide a great way for improving your student and teacher life.

## Background ##
I made LightSchool on my own when I was 14 during my first year at high school. My goal was to improve the italian school and educational system my embracing the digital revolution. I studied by myself Visual Basic (at 11) and then HTML, CSS, Javascript (and jQuery) and PHP. After some readings, I started building LightSchool.

I got my first working version with databases (MySQL) after a month of testing. I worked on it until march 2016, then I stopped working on it due to study duties.

LightSchool had a lot of features such as: notebooks (a.k.a. word processor), sharing (both with students and teachers), a diary where to schedule homeworks, tests and so on, a timetable management system, istant messaging and a class register.

Most of these features still work and LightSchool is still running at https://lightschool.francescosorge.com/ but I'm no longer improving it and fixing bugs.

Because I don't want to see LightSchool vanishing, I decided to make it open source and give the chance to others to improve and keep it alive.

Please, keep in mind that I was a teenager when I started building it and, besides years of improvement, it is far from being a perfect working project with a clean code.

## Getting started ##
1. Download the whole project by either downloading it as a ZIP file or by using ```git clone https://github.com/sorge13248/lightschool.git``` in your terminal.
2. Open each ```base.php``` or ```System/Core.php``` that you will find in directories and make sure you change every value to match your server settings, URL and MySQL connection credentials.
3. Import LightSchool's tables structure from ```lightschool.sql``` into your MySQL database.
4. Have fun!

## Third party library ##
As far as I can remember, LightSchool is using:
* jquery/jquery
* jquery/jquery-ui
* twbs/bootstrap
* harvesthq/chosen
* carhartl/jquery-cookie
* PHPMailer/PHPMailer
* tinymce/tinymce
* sorich87/bootstrap-tour
* PHPOffice/PHPWord
* OwlCarousel2/OwlCarousel2
* Modernizr/Modernizr

## Bug report ##
Found a bug? You're free to report it using the "Issues" tab here on GitHub. Anyway, please note that I'm not currently developing LightSchool so it is unlikely that I will fix bugs. But you're encouraged to fix them yourself and then add a new pull request.
