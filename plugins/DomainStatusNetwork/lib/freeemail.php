<?php

class FreeEmail {

    static $domains =
        array('111mail.com',
              '123iran.com',
              '126.com',
              '163.com',
              '1-usa.com',
              '2die4.com',
              '37.com',
              '420email.com',
              '4degreez.com',
              '4-music-today.com',
              '5.am',
              '5005.lv',
              '8.am',
              'a.org.ua',
              'abha.cc',
              'abv.bg',
              'accountant.com',
              'actingbiz.com',
              'adexec.com',
              'africamail.com',
              'agadir.cc',
              'ahsa.ws',
              'aim.com',
              'ajman.cc',
              'ajman.us',
              'ajman.ws',
              'albaha.cc',
              'alex4all.com',
              'alexandria.cc',
              'algerie.cc',
              'allergist.com',
              'allhiphop.com',
              'alriyadh.cc',
              'alumnidirector.com',
              'amman.cc',
              'anatomicrock.com',
              'animeone.com',
              'anjungcafe.com',
              'any-mail.co.uk',
              'aqaba.cc',
              'arar.ws',
              'archaeologist.com',
              'arcticmail.com',
              'artlover.com',
              'asia.com',
              'asiancutes.com',
              'aswan.cc',
              'a-teens.net',
              'att.net', // not free but consumer
              'ausi.com',
              'australiamail.com',
              'autoindia.com',
              'autopm.com',
              'baalbeck.cc',
              'bahraini.cc',
              'baidu.com',
              'banha.cc',
              'barriolife.com',
              'b-boy.com',
              'beautifulboy.com',
              'berlin.com',
              'bgay.com',
              'bicycledata.com',
              'bicycling.com',
              'bigheavyworld.com',
              'bigmailbox.net',
              'bikerheaven.net',
              'bikerider.com',
              'bikermail.com',
              'billssite.com',
              'binkmail.com',
              'bizerte.cc',
              'bk.ru',
              'blackandchristian.com',
              'blackcity.net',
              'blackvault.com',
              'blida.info',
              'blumail.org',
              'bmx.lv',
              'bmxtrix.com',
              'boarderzone.com',
              'boatnerd.com',
              'bol.com.br',
              'bolbox.com',
              'bongmail.com',
              'bowl.com',
              'btamail.net.cn',
              'buraydah.cc',
              'butch-femme.org',
              'byke.com',
              'cablevision.com',
              'calle22.com',
              'cameroon.cc',
              'cannabismail.com',
              'catlover.com',
              'catlovers.com',
              'certifiedbitches.com',
              'championboxing.com',
              'chatway.com',
              'cheerful.com',
              'chemist.com',
              'chillymail.com',
              'classprod.com',
              'classycouples.com',
              'clerk.com',
              'cliffhanger.com',
              'columnist.com',
              'comcast.net',
              'comic.com',
              'company.org.ua',
              'congiu.net',
              'consultant.com',
              'coolmail.ru',
              'coolshit.com',
              'corpusmail.com',
              'counsellor.com',
              'cutey.com',
              'cyberunlimited.org',
              'cycledata.com',
              'darkfear.com',
              'darkforces.com',
              'deliveryman.com',
              'dhahran.cc',
              'dhofar.cc',
              'dino.lv',
              'diplomats.com',
              'dirtythird.com',
              'djibouti.cc',
              'doctor.com',
              'doglover.com',
              'dominican.cc',
              'dopefiends.com',
              'dr.com',
              'draac.com',
              'drakmail.net',
              'dr-dre.com',
              'dreamstop.com',
              'dublin.com',
              'earthling.net',
              'earthling.net',
              'eclub.lv',
              'egypt.net',
              'e-mail.am',
              'email.com',
              'email.cz',
              'email.it',
              'e-mail.ru',
              'emailfast.com',
              'emails.ru',
              'e-mails.ru',
              'eminemfans .com',
              'envirocitizen.com',
              'eritrea.cc',
              'eritrea.cc',
              'escapeartist.com',
              'europe.com',
              'execs.com',
              'ezsweeps.com',
              'facebook.com',
              'falasteen.cc',
              'famous.as',
              'farts.com',
              'feelingnaughty.com',
              'financier.com',
              'firemyst.com',
              'fit.lv',
              'foxmail.com',
              'free.fr',
              'freeonline.com',
              'fromru.com',
              'front.ru',
              'fudge.com',
              'fujairah.cc',
              'fujairah.us',
              'fujairah.ws',
              'funkytimes.com',
              'gabes.cc',
              'gafsa.cc',
              'gala.net',
              'gamerssolution.com',
              'gardener.com',
              'gawab.com',
              'gazabo.net',
              'geologist.com',
              'giza.cc',
              'glittergrrrls.com',
              'gmail.com',
              'gmx.com',
              'gmx.de',
              'gmx.net',
              'goatrance.com',
              'goddess.com',
              'gohip.com',
              'goldenmail.ru',
              'goldmail.ru',
              'gospelcity.com',
              'gothicgirl.com',
              'gotomy.com',
              'grapemail.net',
              'graphic-designer.com',
              'greatautos.org',
              'guinea.cc',
              'guinea.cc',
              'guy.com',
              'hacker.am',
              'hairdresser.net',
              'haitisurf.com',
              'hamra.cc',
              'happyhippo.com',
              'hasakah.com',
              'hateinthebox.com',
              'hebron.tv',
              'hip hopmail.com',
              'homs.cc',
              'home.nl',
              'hotbox.ru',
              'hotmail.ca',
              'hotmail.com',
              'hotmail.com.ar',
              'hotmail.com.br',
              'hotmail.com.tr',
              'hotmail.co.id',
              'hotmail.co.in',
              'hotmail.co.jp',
              'hotmail.co.th',
              'hotmail.co.uk',
              'hotmail.co.za',
              'hotmail.cz',
              'hotmail.de',
              'hotmail.dk',
              'hotmail.es',
              'hotmail.fr',
              'hotmail.gr',
              'hotmail.it',
              'hotmail.my',
              'hotmail.nl',
              'hotmail.no',
              'hotmail.net',
              'hotmail.ru',
              'hotmail.se',
              'hotmail.sg',
              'hot-shot.com',
              'houseofhorrors.com',
              'hugkiss.com',
              'hullnumber.com',
              'human.lv',
              'hush.com',
              'ibra.cc',
              'idunno4recipes.com',
              'ig.com',
              'ig.com.br',
              'ihatenetscape.com',
              'in.com',
              'iname.com',
              'inbox.com',
              'inbox.lv',
              'inbox.ru',
              'inorbit.com',
              'insurer.com',
              'intimatefire.com',
              'iphon.biz',
              'irbid.ws',
              'irow.com',
              'ismailia.cc',
              'jadida.cc',
              'jadida.org',
              'japan.com',
              'jazzemail.com',
              'jerash.cc',
              'jizan.cc',
              'jouf.cc',
              'journalist.com',
              'juanitabynum.com',
              'kairouan.cc',
              'kanoodle.com',
              'karak.cc',
              'khaimah.cc',
              'khartoum.cc',
              'khobar.cc',
              'kickboxing.com',
              'kidrock.com',
              'kinkyemail.com',
              'klzlk.com',
              'kool-things.com',
              'krovatka.net',
              'kuwaiti.tv',
              'kwick.de',
              'kyrgyzstan.cc',
              'land.ru',
              'laposte.net',
              'latakia.cc',
              'latchess.com',
              'latinabarbie.com',
              'latinmail.com',
              'latinogreeks.com',
              'lavabit.com',
              'lawyer.com',
              'lebanese.cc',
              'leesville.com',
              'legislator.com',
              'list.ru',
              'live.at',
              'live.be',
              'live.cl',
              'live.cn',
              'live.com',
              'live.com.ar',
              'live.com.ph',
              'live.com.sg',
              'live.co.uk',
              'live.com.mx',
              'live.ca',
              'live.cn',
              'live.com.sg',
              'live.de',
              'live.dk',
              'live.fr',
              'live.hk',
              'live.in',
              'live.it',
              'live.jp',
              'live.nl',
              'live.no',
              'live.ru',
              'live.se',
              'lobbyist.com',
              'london.com',
              'lonestar.org',
              'loveable.com',
              'loveemail.com',
              'loveis.lv',
              'lovers-mail.com',
              'lowrider.com',
              'lubnan.cc',
              'lubnan.ws',
              'lucky7lotto.net',
              'lv-inter.net',
              'mac.com',
              'mad.scientist.com',
              'madeniggaz.net',
              'madinah.cc',
              'madrid.com',
              'maghreb.cc',
              'mail.be',
              'mail.com',
              'mail.ru',
              'mail15.com',
              'mail333.com',
              'mailbomb.com',
              'mailinator.com',
              'manama.cc',
              'mansoura.tv',
              'marillion.net',
              'marrakesh.cc',
              'mascara.ws',
              'me.com',
              'megarave.com',
              'meknes.cc',
              'mesra.net',
              'mindless.com',
              'minister.com',
              'mofa.com',
              'moscowmail.com',
              'motley.com',
              'munich.com',
              'muscat.tv',
              'muscat.ws',
              'music.com',
              'musician.net',
              'musician.org',
              'musicsites.com',
              'myopera.com',
              'myself.com',
              'nabeul.cc',
              'nabeul.info',
              'nablus.cc',
              'nador.cc',
              'najaf.cc',
              'narod.ru',
              'naver.com',
              'nepwk.com',
              'netbroadcaster.com',
              'netfingers.com',
              'net-surf.com',
              'nettaxi.com',
              'newmail.ru',
              'ni cedriveway.com',
              'nightmail.ru',
              'nm.ru',
              'nocharge.com',
              'nycmail.com',
              'o2.co.uk',
              'o2.pl',
              'omani.ws',
              'omdurman.cc',
              'operationivy.com',
              'optician.com',
              'oran.cc',
              'oued.info',
              'oued.org',
              'oujda.biz',
              'oujda.cc',
              'ovi.com',
              'paidoffers.net',
              'pakistani.ws',
              'palmyra.cc',
              'palmyra.ws',
              'pcbee.com',
              'pediatrician.com',
              'persian.com',
              'petrofind.com',
              'phunkybitches.com',
              'pikaguam.com',
              'pinkcity.net',
              'pisem.net',
              'pitbullmail.com',
              'planetsmeg.com',
              'playful.com',
              'pochta.ru',
              'pochtamt.ru',
              'poetic.com',
              'pookmail.com',
              'poop.com',
              'poormail.com',
              'pop3.ru',
              'popstar.com',
              'portsaid.cc',
              'post.com',
              'potsmokersnet.com',
              'presidency.com',
              'priest.com',
              'primetap.com',
              'programmer.net',
              'project420.com',
              'prolife.net',
              'publicist.com',
              'puertoricowow.com',
              'puppetweb.com',
              'qassem.cc',
              'qq.com',
              'quds.cc',
              'rabat.cc',
              'rafah.cc',
              'ramallah.cc',
              'rambler.ru',
              'rapstar.com',
              'rapworld.com',
              'rastamall.com',
              'ratedx.net',
              'ravermail.com',
              'rbcmail.ru',
              'realtyagent.com',
              'rediffmail.com',
              'registerednurses.com',
              'relapsecult.com',
              'remixer.com',
              'repairman.com',
              'representative.com',
              'rescueteam.com',
              'rockeros.com',
              'rocketmail.com',
              'romance106fm.com',
              'rome.com',
              'rr.com',
              'sa veourplanet.org',
              'safat.biz',
              'safat.info',
              'safat.us',
              'safat.ws',
              'safe-mail.com',
              'safetypost.de',
              'saintly.com',
              'salalah.cc',
              'salmiya.biz',
              'samerica.com',
              'sanaa.cc',
              'sanfranmail.com',
              'sbcglobal.com',
              'sbcglobal.net',
              'scientist.com',
              'seductive.com',
              'seeb.cc',
              'sexriga.lv',
              'sdf.lonestar.org',
              'sfax.ws',
              'sharm.cc',
              'sina.com',
              'sinai.cc',
              'singalongcenter.com',
              'singapore.com',
              'siria.cc',
              'sketchyfriends.com',
              'slayerized.com',
              'smartstocks.com',
              'smtp.ru',
              'sociologist.com',
              'sok.lv',
              'soon.com',
              'soulja-beatz.org',
              'sousse.cc',
              'spam.lv',
              'specialoperations.com',
              'speedymail.net',
              'spells.com',
              'streetracing.com',
              'subspacemail.com',
              'sudanese.cc',
              'suez.cc',
              'sugarray.com',
              'superbikeclub.com',
              'superintendents.net',
              'supermail.ru',
              'surfguiden.com',
              'sweetwishes.com',
              't-online.de',
              'tabouk.cc',
              'tajikistan.cc',
              'tangiers.cc',
              'tanta.cc',
              'tattoodesign.com',
              'tayef.cc',
              'teamster.net',
              'techie.com',
              'technologist.com',
              'teenchatnow.com',
              'tetouan.cc',
              'the5thquarter.com',
              'theblackmarket.com',
              'timor.cc',
              'tokyo.com',
              'tombstone.ws',
              'trash-mail.com',
              'troamail.org',
              'tunisian.cc',
              'tunisian.cc',
              'tut.by',
              'tx.am',
              'u2tours.com',
              'ua.fm',
              'uaix.info',
              'ukr.net',
              'umpire.com',
              'urdun.cc',
              'usa.com',
              'vipmail.ru',
              'vitalogy.org',
              'whatisthis.com',
              'whoever.com',
              'windowslive.com',
              'winning.com',
              'witty.com',
              'wrestlezone.com',
              'writeme.com',
              'yahoo.ca',
              'yahoo.cl',
              'yahoo.co.id',
              'yahoo.co.in',
              'yahoo.co.jp',
              'yahoo.co.nz',
              'yahoo.co.uk',
              'yahoo.com',
              'yahoo.com.ar',
              'yahoo.com.au',
              'yahoo.com.cn',
              'yahoo.com.hk',
              'yahoo.com.my',
              'yahoo.com.mx',
              'yahoo.com.ph',
              'yahoo.com.sg',
              'yahoo.com.tr',
              'yahoo.com.ve',
              'yahoo.com.vn',
              'yahoo.de',
              'yahoo.dk',
              'yahoo.es',
              'yahoo.fr',
              'yahoo.gr',
              'yahoo.in',
              'yahoo.it',
              'yahoo.pl',
              'yahoo.ro',
              'yahoo.se',
              'yanbo.cc',
              'yandex.ru',
              'yepmail.com',
              'yemeni.cc',
              'yogaelements.com',
              'yopmail.fr',
              'yours.com',
              'yunus.cc',
              'zabor.lv',
              'zagazig.cc',
              'zambia.cc',
              'zarqa.cc',
              'zerogravityclub.com');

    static function isFree($domain) {
        return in_array($domain, self::$domains);
    }
}