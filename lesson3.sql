CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` longtext,
  `preview_pic` text,
  `image` text,
  `anons` text,
  PRIMARY KEY (`id`)
) 


INSERT INTO article VALUES
("3","apple","2016-05-07 00:00:00","
The Request class also has a public attributes property, which holds special data related to how

\nthe application works internally. For the Symfony Framework, the attributes holds the values

\nreturned by the matched route, like _controller, id (if you have an {id} wildcard), and even the

\nname of the matched route (_route). The attributes property exists entirely to be a place where

\nyou can prepare and store context-specific information about the request.

\nSymfony also provides a Response class: a simple PHP representation of an HTTP response message.

\nThis allows your application to use an object-oriented interface to construct the response that needs to

\nbe returned to the client:

\n","01514_photoshopgeek_2560x1600.jpg","01514_photoshopgeek_2560x1600.jpg","The Request class also has a public attributes property, which holds special data related to how
\nthe application works internally. For the Symfony Framework, the attributes holds the values
\nreturned by the matched route, like _controller, id (if you have an {id} wildcard), and even the
\nname of the matched route (_route). "),
("9","Doctrine","2016-05-16 00:00:00","
The Doctrine Project is the home of a selected set of PHP libraries primarily focused on providing persistence services and related functionality. Its prize projects are a Object Relational Mapper and the Database Abstraction Layer it is built on top of. You can read more about what Doctrine has to offer below.

\n
\n
Doctrine Common contains some base functionality and interfaces you need in order to create a Doctrine style object mapper. All of our mapper projects follow the same Doctrine\\Common\\Persistence interfaces. Here are the ObjectManager and ObjectRepository interfaces:

\n","00907_whitesandsnm_2560x1600.jpg","00907_whitesandsnm_2560x1600.jpg","The Doctrine Project is the home of a selected set of PHP libraries primarily focused on providing persistence services and related functionality. Its prize projects are a Object Relational Mapper and the Database Abstraction Layer it is built on top of. You can read more about what Doctrine has to offer below.
\n"),
("10","Installing and Upgrading MySQL","2016-05-16 00:00:00","

\n	

\n	
Determine whether MySQL runs and is supported on your platform.

\n
\n	
Please note that not all platforms are equally suitable for running MySQL, and that not all platforms on which MySQL is known to run are officially supported by Oracle Corporation.

\n	

\n	

\n	
Choose which distribution to install.

\n
\n	
Several versions of MySQL are available, and most are available in several distribution formats. You can choose from pre-packaged distributions containing binary (precompiled) programs or source code. When in doubt, use a binary distribution. Oracle also provides access to the MySQL source code for those who want to see recent developments and test new code. To determine which version and type of distribution you should use, seeSection 2.1.1, “Which MySQL Version and Distribution to Install”.

\n	

\n

\n","00111_rain_2560x1600.jpg","00111_rain_2560x1600.jpg","This chapter describes how to obtain and install MySQL. A summary of the procedure follows and later sections provide the details. If you plan to upgrade an existing version of MySQL to a newer version rather than install MySQL for the first time, see Section 2.11.1, “Upgrading MySQL”, for information about upgrade procedures and about issues that you should consider before upgrading.");
