# QuestionForm

The task is implemented in PHP, using the latest version of the Symfony framework.

The task is to create a contact page for a fictional website that features a simple contact form. In the form, users can ask questions from the site. 
Incoming questions must be saved in a database.
The page does not have to contain anything else but a contact form. The following fields should appear on the form:

* Neved (Your name)
* E-mail címed (Your email address)
* Üzenet szövege (Message text)
* Küldés gomb (Send button)

All three fields must be filled in. 
The "Your name" and "E-mail address" fields should contain one line of text, while the "Message text" field should contain one paragraph of text. 
By clicking the "Send" button, one of the following two cases should occur: 
  1. All fields are filled in correctly: "Köszönjük szépen a kérdést. Válaszunk hamarosan keresünk a megfelelő e-mail címen." 
  ("Thank you very much for your question. We will be looking for an answer soon at the appropriate e-mail address.")
  2. One of these three fields is left blank: "Hiba! Kérem töltsd ki az összes mezőt!" ("Error! Please fill in all fields!")

Submitted questions should be saved in a database.
