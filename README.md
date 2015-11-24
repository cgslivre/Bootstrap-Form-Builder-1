# Bootstrap Form Builder

Form Builder is php 5 class to create Twitter Bootstrap html5 form, supports :

- form (name, title, [action="", method=POST, onsubmit, attribute])

- input [value, class, style, pattern, attributes, after, tip]
  - text (name, label, required, [datalist])
  - password (name, label, required)
  - email (name, label, required)
  - tel  (name, label, required)
  - search (name, label, required)
  - radio (name, label, required, options, selected, type=vertical|horizontal)
  - checkbox (name, label, required, options, selected, type=vertical|horizontal)
  - file (name, label, required, accept)
  - number (name, label, required)
  - range (name, label, required, [min, max, step])
  - color (name, label, required)
  - date (name, label, required, format)
  - url (name, label, required, format)
  - hidden (name)
  - button (id, value)
  - submit (id, value)
  - reset  (id, value)
  - image (src, [width, height])

- datalist (id, options)

- select [class, style, tip]
  - single  (name, label, required, options, [selected])
  - multiple  (name, label, required, options, [selected])

- textarea (name, label, required) [class, style, tip, value]

- fieldset
  - start (id, label)
  - end
  
- form-control (id, label)

- html (code)

- button  (id, value)

```php
    $form = new BootstrapForm('my_form', "Form title");
    $form->text('Login', 'Your login', true)->attr('placeholder', 'Login');
    $form->password('Password', '', true)->pattern('A-Z', "please enter upper value");
    $form->render();
```

