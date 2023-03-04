# Php Lorem

A simple package to generate quick lorem ipsum text for any testing or database seeding.

### Installation

```bash
composer require vildanhakanaj/php-lorem
```

### Requirements

php ^7.4 || ^8.2

### Usage

#### Words
```php
$lorem = new Lorem();
// Generate words
$lorem->words(5); // Nulla id aliqua, tempus.
// Static
Lorem::words(5);
```

#### Sentences

```php
$lorem->generateSentences(5); 
Lorem::sentences(5);
// Sed, elit consectetur imperdiet. Lectus non euismod id egestas egestas. Mauris elit faucibus sem. Faucibus volutpat mi. Iaculis quis sagittis.
```
#### Paragraphs

```php
$lorem->generateParagraphs(5); 
Lorem::paragraphs(5);
// Mattis non egestas sed. Vel eget vel imperdiet aliqua urna magna dolor. Laoreet nibh eu purus. Faucibus dolor egestas pellentesque odio erat egestas. Nulla molestie labore a, faucibus.
//Curabitur sit, viverra aliqua. Ipsum, do, lorem, lectus urna tellus a dolore. Erat et eiusmod consectetur aliquet nibh imperdiet, non. Egestas, do pellentesque malesuada, labore elit nunc imperdiet. Mattis accumsan, erat dolore massa lorem dui. Do, eu sit cursus, non ipsum adipiscing laoreet.
//Et, lorem a, tincidunt consectetur magna. Sem non ut ipsum ut, amet. Nibh, laoreet, quis egestas ornare iaculis. Egestas eu mattis, sed. Tincidunt, sit enim nam, sed fringilla, incididunt enim.
//Adipiscing lacus sed sed. Quis ornare ullamcorper id. Imperdiet non sodales. Eiusmod sodales eget tempus do cras, non tempus. Elit, urna incididunt dolor, dolore et nulla fringilla. Tellus ornare a turpis, ultrices. Urna eu ut ut. Consectetur tempor volutpat, condimentum. Amet est quis amet vel purus gravida consectetur. Accumsan dignissim, consectetur ullamcorper, arcu pellentesque. Adipiscing sodales lectus lacus labore. Dolore sed dui euismod. Fermentum ipsum urna non. Gravida consectetur egestas ut tincidunt erat pellentesque, id.
//Massa, aliqua, laoreet consectetur. Sem purus, sed eu, sed enim leo. Pellentesque id morbi sodales, lorem, id. Volutpat sed consectetur ut. Egestas nunc a. Ut incididunt leo enim lobortis. Consectetur imperdiet aliqua. Purus diam accumsan nibh eget at scelerisque. Diam adipiscing id id adipiscing. Gravida sed laoreet ullamcorper faucibus. Lorem, egestas vestibulum leo.
```

#### Use your own words

```php
Lorem::fromWords(["this", "will", "override", "default"])->words(5); // Will this, will, default
```
