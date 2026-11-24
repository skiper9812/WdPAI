<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Portal Mieszkańca PK - Logowanie</title>
  <meta name="description"
    content="Portal Mieszkańca Domów Studenckich Politechniki Krakowskiej. Logowanie kontem uczelnianym PK lub danymi kwaterunkowymi." />
  <link rel="stylesheet" href="/css/tokens.css">
  <link rel="stylesheet" href="/css/globals.css">
  <link rel="stylesheet" href="/css/login.css">
  <script src="/scripts/theme.js"></script>
</head>

<body>
  <div class="logowanie-dark">
    <main class="portal-mieszkaca">
      <aside class="uczelnia-i-domy">
        <header class="politechnika">
          <span class="symbol-uczelni"><span class="ikona ikona-mask ikona-dorm"></span></span>
          <div class="nazwa-uczelni">
            <h1 class="uczelnia">Politechnika Krakowska</h1>
            <span class="portal">OSIEDLE STUDENCKIE PK</span>
          </div>
        </header>

        <section class="wprowadzenie-do">
          <span class="semestr">
            <span class="znacznik-semestru"></span>
            <span class="okres">Semestr letni 2024/2025</span>
          </span>
          <h2 class="powitanie">Witaj w Portalu Mieszkańca<br />Domów Studenckich PK</h2>
          <p class="tre">Zarządzaj rezerwacją sal wspólnych, pralniami, opłatami i sprawami kwaterunkowymi w jednym
            miejscu.</p>
        </section>

        <section class="domy-studenckie-w">
          <h3 class="kampus">DOMY STUDENCKIE W<br />KAMPUSIE</h3>
          <article class="dom-studencki">
            <header class="dom-naglowek">
              <h4 class="nazwa-akademika">DS-1<br />Rumcajs</h4>
              <span class="etykieta-statusu status">Czyżyny</span>
            </header>
            <p class="text-wrapper">Siłownia • Sala bilardowa • Sala telewizyjna</p>
          </article>
          <article class="dom-studencki">
            <header class="dom-naglowek">
              <h4 class="nazwa-akademika">DS-2<br />Leon</h4>
              <span class="etykieta-statusu status">Czyżyny</span>
            </header>
            <p class="text-wrapper">Siłownia • Sala bilardowa • Sala telewizyjna</p>
          </article>
          <article class="dom-studencki">
            <header class="dom-naglowek">
              <h4 class="nazwa-akademika">DS-3<br />Bartek</h4>
              <span class="etykieta-statusu status">Czyżyny</span>
            </header>
            <p class="text-wrapper">Strefa chillout • Sala gier planszowych i konsol</p>
          </article>
          <article class="dom-studencki">
            <header class="dom-naglowek">
              <h4 class="nazwa-akademika">DS-4<br />Balon</h4>
              <span class="etykieta-statusu status">Czyżyny</span>
            </header>
            <p class="text-wrapper">Nowoczesna pralnia automatyczna • Ping-pong • Sala wielofunkcyjna</p>
          </article>
        </section>

        <button id="theme-toggle" class="przelacznik-motywu" type="button" aria-label="Zmień motyw">
          <span class="ikona-motyw ikona-mask ikona-slonce"></span>
          <span class="ikona-motyw ikona-mask ikona-ksiezyc"></span>
          <span class="etykieta-motywu">Tryb ciemny</span>
        </button>
      </aside>

      <section class="logowanie-i-pomoc">
        <div class="metody-logowania">
          <header class="nagwek-logowania">
            <div class="tytu-i-wersja">
              <h2 class="text-wrapper-2">Logowanie do Portalu Mieszkańca</h2>
              <span class="etykieta-statusu status">Wersja 3.4</span>
            </div>
            <p class="text-wrapper">Zaloguj się kontem uczelnianym PK lub danymi kwaterunkowymi DS</p>
          </header>

          <div class="logowanie-przez-SSO">
            <button type="button" class="konto-microsoft">
              <span class="microsoft">
                <img class="img" src="/img/red.svg" alt="" />
                <img class="microsoft-2" src="/img/blue.svg" alt="" />
                <img class="microsoft-3" src="/img/green.svg" alt="" />
                <img class="microsoft-4" src="/img/yellow.svg" alt="" />
              </span>
              <span class="konto-uczelniane">
                <span class="dostawca">Konto Microsoft 365 PK</span>
                <span class="domena-uczelniana">(@student.pk.edu.pl)</span>
              </span>
              <span class="ikona-2 ikona-mask ikona-arrow-right"></span>
            </button>
            <button type="button" class="wze-krajowy">
              <span class="login-gov"><span class="polska">PL</span></span>
              <span class="metoda-krajowa">Węzeł Krajowy (login.gov.pl / mObywatel)</span>
            </button>
          </div>

          <div class="alternatywna-metoda">
            <span class="separator"></span>
            <span class="dane-kwaterunkowe">LUB ZALOGUJ SIĘ DANYMI KWATERUNKOWYMI</span>
            <span class="separator"></span>
          </div>

          <form class="dane-kwaterunkowe-2" action="/" method="get">
            <div class="pole-logowania">
              <div class="etykieta-wiersz">
                <span class="tre-2">Wybierz Twój Dom Studencki</span>
                <span class="tre-3">Wymagane</span>
              </div>
              <div class="pole-danych" tabindex="0" role="combobox" aria-expanded="false">
                <span class="ikona-3 ikona-mask ikona-house"></span>
                <span class="p">DS-1 Bydgoska (ul. Bydgoska 19)</span>
                <span class="ikona-4 ikona-mask ikona-dropdown"></span>
              </div>
            </div>

            <div class="pole-logowania">
              <label class="tre-2">Numer albumu / PESEL / Identyfikator kwaterunkowy</label>
              <div class="pole-danych">
                <span class="ikona-5 ikona-mask ikona-id"></span>
                <span class="tre-4">np. 123456 lub numer umowy</span>
              </div>
            </div>

            <div class="pole-logowania haso-i-odzyskiwanie">
              <div class="etykieta-wiersz">
                <label class="tre-2">Hasło dostępu</label>
                <a href="#" class="tre-5 tre-5-desktop">Nie pamiętasz hasła?</a>
              </div>
              <div class="pole-danych">
                <span class="ikona-6 ikona-mask ikona-lock"></span>
                <span class="tre-4">Wprowadź hasło</span>
                <span class="ikona-7 ikona-mask ikona-eye" role="button" aria-label="Pokaż hasło"></span>
              </div>
              <a href="#" class="tre-5 odzyskaj-haso nie-pami-tasz-has-a">Nie pamiętasz hasła?</a>
            </div>

            <label class="zapamitaj-urzdzenie">
              <input type="checkbox" name="remember" class="pole-wyboru-input" hidden />
              <span class="pole-wyboru"></span>
              <span class="tre-6">Zapamiętaj na tym urządzeniu (zgodnie z RODO PK)</span>
            </label>

            <button type="submit" class="przycisk">
              <span class="etykieta">Zaloguj się do systemu mieszkańca</span>
              <span class="ikona-8 ikona-mask ikona-arrow-bracket"></span>
            </button>

            <aside class="certyfikat">
              <span class="ikona-9 ikona-mask ikona-shield"></span>
              <p class="zabezpieczenia">Zabezpieczone certyfikatem Politechniki Krakowskiej<br />&nbsp;&nbsp;•
                Autoryzacja e-Dziekanat / USOS</p>
            </aside>
          </form>
        </div>

        <footer class="rekrutacja-i-kontakt">
          <p class="tre-7">Nie jesteś jeszcze zakwaterowany?</p>
          <a href="#" class="tre-8">Złóż wniosek o przydział pokoju w systemie rekrutacji DS →</a>
          <hr class="separator-2" />
          <div class="dyur-i-portiernia">
            <span class="kontakt-telefoniczny"><span class="ikona-mask ikona-telephone-ring"></span></span>
            <div class="portiernia">
              <span class="tre-9">Dyżur &amp; Portiernia 24/7</span>
              <span class="tre-10">+48 12 628 20 00</span>
            </div>
            <div class="pomoc-dyspozytora">
              <span class="tre-11">Dyspozytor DS</span>
              <span class="tre-12">Awaria / Pomoc</span>
            </div>
          </div>
          <div class="obszar-gestw"><span class="wskanik-gestw"></span></div>
        </footer>
      </section>
    </main>
  </div>
</body>

</html>
