## Edf3ly - Task

Program that can price a cart of products, accept multiple products, combine offers, and display a total detailed bill in different currencies (based on user selection).

#####Available catalog products and their price in USD:

>T-shirt $10.99 <br>
>Pants $14.99 <br>
>Jacket $19.99 <br>
>Shoes $24.99 <br>

The program can handle some special offers, which affect the pricing.

####Available offers:

1- Shoes are on 10% off. <br>
2- Buy two t-shirts and get a jacket half its price. <br>
3- The program accepts a list of products, outputs the detailed bill of the subtotal, tax, and discounts if applicable, bill can be displayed in various currencies.<br>

<i>There is a 14% tax (before discounts) applied to all products. <i>

E.g.:

#####Adding the following products:
>T-shirt <br>
>T-shirt <br>
>Shoes <br>
> Jacket <br>
  
#####Outputs the following bill, the user selected the USD bill:
>Subtotal: $66.96 <br>
>Taxes: $9.37 <br>
>Discounts: <br>
	>10% off shoes: -$2.499 <br>
	>50% off jacket: -$9.995 <br>
>Total: $63.8404 <br>   

#####Another, e.g., If none of the offers are eligible, the user selected the EGP bill:

>T-shirt <br>
>Pants <br>

######Outputs the following bill:
>Subtotal: 409 e£ <br>
>Taxes: 57 e£ <br>
>Total: 467 e£ <br>

##setup guid


####after git clone don't forget following this steps


  4. create database Name is "X" or create database as you like
   and open main directory on project then .env file to set database name connection(DB_DATABASE,DB_USERNAME,DB_PASSWORD)
  [
		  'DB_DATABASE'=>'x' ,
		  'DB_USERNAME'=>'Y',
		  'DB_PASSWORD'= 'P'
  ] <br>
 5. Run commend : 
 >php artisan migrate --seed 
 
will create just admin user <br>
 >amrmuhamed9@gmail.com <br>
>12345678 <br>

 ###### Or Import SQl File will get DataTest get data make test more easy
>path: /database/db/l-cart.sql <br>

####will find: 
>categories , products , 2 user accounts [admin,user],city
<br>

Admin Account: 
 >user : amrmuhamed9@gmail.com <br>
>password : 12345678 <br>

User Account:
>user: amer@mail.com <br>
>password: wcm5voes <br>


##### can access dashboard using progict url/login try to use it and make a code review as you like
 Ex Site urls:  <br>
 http://l-cart.test = your domain
 >http://l-cart.test <br>
>http://l-cart.test/login #as admin ro user <br>

#####Ex:sit url support currencies (deafualt currency = usd)from [l.e,usd]
 > http://l-cart.test/ar?cur=l.e <br>
> http://l-cart.test/ar?cur=usd <br>
>http://l-cart.test/ar?cur=  <br>
>Or  ######ex site url support localization [ar,en] <br>
>http://l-cart.test/en <br>
>http://l-cart.test/ar <br>
