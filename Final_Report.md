# Final Report
Project: Super Secure Login Page

GitHub Name: Web Security

Team Name: Scandinavian Defence
* [Alex Brock](https://github.com/ShrimpyJ)
* [Blake Childress](https://github.com/ObsidianSkin)
* [Jacob Leonard](https://github.com/jacobleonard545)

## 1. Introduction
### What is the project?
A custom website with vulnerabilities to be exploited, explained, and secured with pentesting tools.

### What is the motivation for the project?
Desire to learn proper web security methods and be able to create a functional, safe, and low-cost website with strong authentication.

### Briefly describe your approach
First we conducted market research on similar products and information on how to create what we envisioned. Then, we assigned tasks to group members that could be completed separately and brought together into a finished product. Finally, finishing touches were made and further improvements were noted.

### Major changes?
There were no major changes to requirements besides abandoning the idea of a “secure” website. Instead, we pivoted over to a more focused idea where instead of securing a website for commercial use we created an obviously insecure website for education and fun. We did, however, have to abandon GitHub Pages due to the lack of support for databases or truly dynamic web pages. There are workarounds, but we found those unhelpful and ultimately a waste of time.

In the end we were left with a nice looking website that hosted a number of intentional (and likely unintentional) vulnerabilities that budding security enthusiasts can explore. Of course, there are things to be expanded upon and changes to be made, but we accomplished the basic goals we set out to complete.

## 2. Customer Value
### Changes from project proposal
The initial project direction was a little unsure of where it wanted to go. Was it a website designed to be secure with no content, or were we offering a way to secure already-established pages? In the end, we focused entirely on developing an insecure website for the sake of learning and exploring with nuggested of wisdom sprinkled in. This change was made early on when development really began in February and allowed us to better narrow our focus.

Now, the primary customer is undoubtedly people interested in web security such as developers or hobbyists. They want a place to learn and use the knowledge gained in a semi-practical application, like an insecure login page. Many people are intimidated by fields that require hefty technical prowess, and look for resources that are akin to a garden hose rather than a fire hydrant. Now, the success is measured by the practicality of the exploits presented and the importance of knowledge gained. Furthermore, it is up to us to point new users in the right direction in terms of resources and legality.

## 3. Technology
### Architecture: components and their relationships
Technology has shifted focus as the project requirements have changed. Instead of worrying about a “super secure” website, we instead focus on infrastructure that allows us to host simple exploits and move away from static platforms like GitHub Pages. Site and database hosted on an AWS EC2 server. Backed consists of MariaDB and PHP files which access the database. This straightforward implementation gives easy access to site resources for the user to “hack” into.

### What works and what does not? Describe tests/results.
Everything that is on the website and viewable to the user should be functioning as intended. However, pulling from test branches like “blake” or “legacy” may result in broken or unfinished qualities (like the scoreboard on the blake branch). No unit tests were necessary for this project. All developers had local testing including a database that is separate from the live site (controlled by Alex). Any changes or additions made were on local repos or test branches and ran before pushing to the main/production branch to be implemented into the public website. 

## 4. Team 
### What role did team members have throughout the project?
We all were responsible for research and development on our website. Measures were taken to ensure that everyone had an equal amount of work on their plate. Overall, I would say all team members contributed equally to the final product. However, Alex Brock did make several huge overhauls to our project that left it in a much better (and functional state) than before. Therefore, he deserves most of the credit when it comes to the current version of our project.
	-Blake

### Did team member roles change or were they mostly static?
As the requirements for our project changed, so did our team roles. As stated previously, the front-end and back-end design for the current website is all thanks to Alex Brock. Blake and Jacob still made contributions inline with their original roles, as did Alex. In the end, Blake, Jacob and Alex made efforts on the security side of research and polishing the website (including the resources accessed through the home page). We all had to assume the mythical role of the “Rockstar Developer”.

## 5. Project Management
### Did you complete all of your goals for the product on schedule?
We met all of our major goals by the end of the project lifespan. These “goals” are different than the ones expressed on our Project Proposal, due to the goal of the project changing. However, these goals were not met entirely on schedule as proposed originally. We (mostly Alex) had to complete a few crunches to complete the implementation in a timely manner. The main reason for this is that we spent many wasted hours trying to get GitHub Pages to bend to our will. 

## 6. Reflection
### For this iteration and throughout the project: (What went/did not go well?)
As with many group projects, team management and planning are as crucial as they are difficult. Our schedule and plans were thorough, and we met at a semi-regular date/time throughout development. However, halts in development when encountering particularly difficult issues and work in other courses made completing our goals on time challenging. Research and development carried on at a regular pace until the end, where we conducted several crunches to meet certain goals. I would say everything went well and we learned a lot about managing a group project on a deadline.

### Do you consider the final project a success? Why or why not?
There were many challenges and changes during the development of our project. Still, we were able to complete our refined vision of the product and create something we are all proud of. Furthermore, this website may prove useful to someone who is brand new to web security and eventually introduce them to better resources for learning. There are several improvements that can be made right off the bat such as a scoreboard to track challenge completion, a defined system for said challenges, more exploits, etc. It would also be helpful if there were a more streamlined way to set up this website and backend by using a service like Docker. I would consider the final project a success.
