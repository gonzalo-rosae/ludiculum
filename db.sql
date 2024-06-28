CREATE TABLE sustantivos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    traduccion VARCHAR(50) NOT NULL,
    declinacion INT,
    genero VARCHAR(10),
    regularidad VARCHAR(10),
    utilizado TINYINT(1) DEFAULT 0
);

/*
 regularidad:
 ""            → regular; desinencias por defecto
 "$consonante" → semirregular; a partir de la consonante puedo generar la declinación
 "irregular"   → irregular; necesito consultar todas sus formas "ad hoc"
*/
INSERT INTO
    sustantivos (
        nombre,
        traduccion,
        declinacion,
        genero,
        regularidad
    )
VALUES
    ('puella', 'niña', 1, 'f', ''),
    ('domina', 'señora', 1, 'f', ''),
    ('nauta', 'navegante', 1, 'm', ''),
    ('silva', 'bosque', 1, 'f', ''),
    ('pecunia', 'dinero', 1, 'f', ''),
    ('puer', 'niño', 2, 'm', ''),
    ('dominus', 'señor', 2, 'm', ''),
    ('vir', 'hombre', 2, 'm', ''),
    ('templum', 'templo', 2, 'n', ''),
    ('populus', 'pueblo/gente', 2, 'm', ''),
    ('bellum', 'guerra', 2, 'n', ''),
    ('ovis', 'oveja', 3, 'f', ''),
    ('plebs', 'pueblo/gente', 3, 'f', ''),
    ('hiems', 'invierno', 3, 'f', ''),
    ('consul', 'cónsul', 3, 'm', ''),
    ('pastor', 'pastor', 3, 'm', ''),
    ('pes', 'pie', 3, 'm', 'd'),
    ('cor', 'corazón', 3, 'n', 'd'),
    ('lac', 'leche', 3, 'n', 't'),
    ('lex', 'ley', 3, 'f', 'g'),
    ('rex', 'rey', 3, 'm', 'g'),
    ('dux', 'líder/general', 3, 'm', 'c'),
    ('lux', 'luz', 3, 'f', 'c'),
    ('legio', 'legión', 3, 'f', 'n'),
    ('leo', 'león', 3, 'm', 'n'),
    ('honos', 'honor', 3, 'm', 's'),
    ('flos', 'flor', 3, 'm', 's'),
    ('manus', 'mano', 4, 'f', ''),
    ('cornu', 'cuerno', 4, 'n', ''),
    ('genu', 'rodilla', 4, 'n', ''),
    ('tribus', 'tribu', 4, 'f', ''),
    ('gelu', 'hielo', 4, 'n', ''),
    ('dies', 'día', 5, 'f', ''),
    ('res', 'cosa', 5, 'f', ''),
    ('spes', 'esperanza', 5, 'f', ''),
    ('species', 'vista', 5, 'f', ''),
    ('fides', 'fe', 5, 'f', ''),
    ('insula', 'isla', 1, 'f', ''),
    ('sella', 'silla', 1, 'f', ''),
    ('fenestra', 'ventana', 1, 'f', ''),
    ('ianua', 'puerta', 1, 'f', ''),
    ('discipula', 'alumna', 1, 'f', ''),
    ('sarcina', 'mochila', 1, 'f', ''),
    ('dea', 'diosa', 1, 'f', ''),
    ('amicitia', 'amistad', 1, 'f', ''),
    ('ara', 'altar', 1, 'f', ''),
    ('chartula', 'postal', 1, 'f', ''),
    ('filia', 'hija', 1, 'f', ''),
    ('incola', 'habitante', 1, 'f', ''),
    ('laetitia', 'alegría', 1, 'f', ''),
    ('via', 'calle', 1, 'f', ''),
    ('causa', 'causa', 1, 'f', ''),
    ('fabula', 'fábula/mito', 1, 'f', ''),
    ('fuga', 'huida', 1, 'f', ''),
    ('crustula', 'galleta', 1, 'f', ''),
    ('audacia', 'audacia', 1, 'f', ''),
    ('penna', 'pluma', 1, 'f', ''),
    ('ala', 'ala', 1, 'f', ''),
    ('cera', 'cera', 1, 'f', ''),
    ('ira', 'ira', 1, 'f', ''),
    ('catella', 'perrita', 1, 'f', ''),
    ('casa', 'cabaña/choza', 1, 'f', ''),
    ('pugna', 'lucha', 1, 'f', ''),
    ('deus', 'dios', 2, 'm', ''),
    ('magister', 'maestro', 2, 'm', ''),
    ('agnus', 'cordero', 2, 'm', ''),
    ('amicus', 'amigo', 2, 'm', ''),
    ('digitus', 'dedo', 2, 'm', ''),
    ('equus', 'caballo', 2, 'm', ''),
    ('avus', 'abuelo', 2, 'm', ''),
    ('capillus', 'cabello', 2, 'm', ''),
    ('vicinus', 'vecino', 2, 'm', ''),
    ('liber', 'libro', 2, 'm', ''),
    ('oculus', 'ojo', 2, 'm', ''),
    ('ventus', 'viento', 2, 'm', ''),
    ('hortus', 'huerto', 2, 'm', ''),
    ('caseus', 'queso', 2, 'm', ''),
    ('servus', 'esclavo', 2, 'm', ''),
    ('crystallus', 'cristal', 2, 'm', ''),
    ('Olympus', 'Olimpo', 2, 'm', ''),
    ('rivus', 'arroyo', 2, 'm', ''),
    ('asinus', 'asno', 2, 'm', ''),
    ('donum', 'don/regalo', 2, 'n', ''),
    ('incendium', 'incendio', 2, 'n', ''),
    ('oleum', 'aceite', 2, 'n', ''),
    ('oppidum', 'fortaleza', 2, 'n', ''),
    ('scutum', 'escudo', 2, 'n', ''),
    ('vitium', 'vicio/defecto', 2, 'n', ''),
    ('miles', 'soldado', 3, 'm', 't'),
    ('virtus', 'virtud', 3, 'f', 't'),
    ('aries', 'carnero/ariete', 3, 'm', 't'),
    ('pax', 'paz', 3, 'f', 'c'),
    ('mons', 'monte', 3, 'm', 't'),
    ('dolor', 'dolor', 3, 'm', ''),
    ('hostis', 'enemigo', 3, 'm', ''),
    ('crudelitas', 'crueldad', 3, 'f', 't'),
    ('pietas', 'piedad', 3, 'f', 't'),
    ('ius', 'ley/derecho', 3, 'n', 's'),
    ('arcus', 'arco', 4, 'm', ''),
    ('cursus', 'carrera/curso', 4, 'm', ''),
    ('ductus', 'conducción', 4, 'm', ''),
    ('exercitus', 'ejército', 4, 'm', ''),
    ('eventus', 'resultado', 4, 'm', ''),
    ('meridies', 'mediodía', 5, 'm', ''),
    ('series', 'serie/sucesión', 5, 'f', '');

/* parva, magna, aperta, clausa, laboriosa, laeta, sordida, alba, rubra, pulchra, fessa, bona, vera */
/* latus, callidus, mundus, sordidus, timidus, bonus, carus, pulcher, iniustus, frigidus, fuscus, niger, albus, curatus, frugiler, lepidus, nullus, subiectus, turbulentus */
/* antiquitus (en la antiguedad), igitur (asi pues), neque (ni), nunc (ahora), verbi gratia (por ejemplo) */
/* inscriptio, aedificium, periculum */
/* libertas, ignorantia, ignus?, aqua, consilium?, exemplum, parentis?, liber, oris?, oratio, mel, aurum, nox, aestas */
/* odium, amor, mulier, somnus, mors, lingua, sententia */
/* felix, miser, gratia, basium, theatrum, omnium?, ebrius, barbarus, iuventus?, senectus?, itiner?, nympha */
/* urbs, cubiculum, balneum, culina, sol, pluvia */
CREATE TABLE verbos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25) NOT NULL,
    traduccion VARCHAR(50) NOT NULL,
    conjugacion INT,
    utilizado TINYINT(1) DEFAULT 0
);

INSERT INTO
    verbos (nombre, traduccion, conjugacion)
VALUES
    ('aro', 'arar', 1),
    ('video', 'ver', 2),
    ('cano', 'cantar', 3),
    ('audio', 'oír', 4),
    ('capio', 'coger', 5);

CREATE TABLE ejercicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    solucion VARCHAR(255) NOT NULL,
    utilizado TINYINT(1) DEFAULT 0
);

INSERT INTO
    ejercicios (nombre, solucion)
VALUES
    ('Puella alta esxx', 't'),
    ('Puellae altxx sunt', 'ae'),
    ('Puella, altxx es', 'a'),
    ('Puellae, altae xx', 'estis'),
    ('Hispania patrixx nostra est', 'a'),
    ('Maiorica et Minorica insulxx sunt', 'ae'),
    ('Discipulae, altxx estis', 'ae'),
    ('Mensxx vestras videtis', 'as'),
    ('Antonia pecuniam filixx dat', 'ae'),
    ('Valeria multas rosxx deae dat', 'as'),
    (
        'Paula pecunixx filiae suae dare solet',
        'am'
    ),
    (
        'Paula filixx Aemiliam amat, sed pecuniam Aemilixx dare non solet',
        'am;ae'
    ),
    ('Valeria dexx aras rosis ornat', 'ae/is'),
    ('Cum Antonia et Valerixx deambulo', 'a'),
    ('Alas pennis et cerxx mihi conficio', 'a'),
    (
        'Antiqua Hispania in silvxx suis magnam ferarum copiam habuit',
        'is'
    ),
    ('Poeta lyrxx canit', 'a'),
    (
        'In sarcinxx nostris multas chartas portamus',
        'is'
    ),
    ('Meus amicus bonxx est', 'us'),
    (
        'Lupus callidus est; lupa etiam callidxx est',
        'a'
    ),
    ('Ager latxx erat', 'us'),
    ('Agnus timidxx esse solet', 'us'),
    ('Agricola lupxx videt et fugxx temptat', 'um;am'),
    (
        'Salve, magister. Librum linguxx Latinxx mihi das?',
        'ae;ae'
    ),
    (
        'Viri et feminae deo Neptuno gratixx agebant',
        'as'
    ),
    ('Marcus avxx et avixx libros dat', 'o;ae'),
    (
        'In agrxx et silvis multae ferae incolunt',
        'is'
    ),
    (
        'Graeci et Romani multxx templxx aedificaverunt',
        'a;a'
    ),
    (
        'Divitiae saepe feminas et virxx in vitia praecipitant',
        'os'
    ),
    (
        'Vinum Bacchi dei donum fuit, oleum Minervxx',
        'ae'
    ),
    ('Saepe fumus incendixx nuntiat', 'um'),
    (
        'In proeliis Graeci et Romani diversxx arma portabant; galeis et scutxx se tegebant, et pilis et gladixx in hostes pugnabant',
        'a;is;is'
    );
