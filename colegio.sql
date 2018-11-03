--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: acudiente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE acudiente (
    id_acudiente character varying(15) NOT NULL,
    nombre character varying(40) NOT NULL,
    telefono1 character varying(20) NOT NULL,
    parentesco character varying(20)
);


ALTER TABLE public.acudiente OWNER TO postgres;

--
-- Name: archivos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE archivos (
    id_grado character varying(15) NOT NULL,
    titulo character varying(20) NOT NULL,
    tamano character varying(10),
    nombre character varying(30) NOT NULL,
    id_year character varying(10),
    tipo character varying(100),
    id_archivo integer NOT NULL,
    id_materia integer,
    id_profesor character varying(15)
);


ALTER TABLE public.archivos OWNER TO postgres;

--
-- Name: archivos_id_archivo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE archivos_id_archivo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.archivos_id_archivo_seq OWNER TO postgres;

--
-- Name: archivos_id_archivo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE archivos_id_archivo_seq OWNED BY archivos.id_archivo;


--
-- Name: estudiante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estudiante (
    id_estudiante character varying(15) NOT NULL,
    nombre character varying(40) NOT NULL,
    apellido character varying(40) NOT NULL,
    telefono1 character varying(20),
    celular1 character varying(20),
    direccion character varying(40) NOT NULL,
    id_acudiente character varying(15) NOT NULL,
    id_grado character varying(15) NOT NULL,
    correo character varying(50),
    apellido2 character varying(20),
    id_imagen character varying(50),
    clave character varying(100),
    id_usuario character varying(3),
    id_padre character varying(15),
    id_madre character varying(15),
    alergias character varying(140),
    sisben character varying(2),
    situacion character varying(50),
    nombre2 character varying(30),
    genero character varying(11),
    sangre character varying(5),
    place character varying(50),
    edad numeric,
    tipo character varying(40),
    departamento character varying(40),
    municipio character(40),
    barrio character varying(40),
    estrato character varying(2),
    puntaje character varying(40),
    id_year character varying(10),
    born character varying(20)
);


ALTER TABLE public.estudiante OWNER TO postgres;

--
-- Name: grado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE grado (
    id_grado character varying(15) NOT NULL,
    nombre_grado character varying(20) NOT NULL
);


ALTER TABLE public.grado OWNER TO postgres;

SET default_with_oids = true;

--
-- Name: gradomateria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE gradomateria (
    id_grado character varying(15),
    id_year character varying(10),
    id_materia integer
);


ALTER TABLE public.gradomateria OWNER TO postgres;

SET default_with_oids = false;

--
-- Name: imagen; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE imagen (
    id_imagen character varying(100) NOT NULL
);


ALTER TABLE public.imagen OWNER TO postgres;

--
-- Name: madre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE madre (
    nombres character varying(50) NOT NULL,
    apellidos character varying(50) NOT NULL,
    nacimiento character varying(10),
    id_madre character varying(15) NOT NULL,
    direccion_casa character varying(50) NOT NULL,
    celular character varying(15),
    correo character varying(50) NOT NULL,
    estrato character varying(2),
    nivel_academico character varying(20),
    profesion character varying(20),
    empresa character varying(50),
    cargo character varying(50),
    direccion_laboral character varying(50),
    telefono_laboral character varying(15),
    telefono_casa character varying(15),
    barrio character varying(50),
    id_usuario character varying(3),
    id_imagen character varying(50),
    clave character varying(100)
);


ALTER TABLE public.madre OWNER TO postgres;

--
-- Name: materia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE materia (
    nombre_mate character varying(50) NOT NULL,
    id_materia integer NOT NULL
);


ALTER TABLE public.materia OWNER TO postgres;

--
-- Name: materia_id_materia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE materia_id_materia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materia_id_materia_seq OWNER TO postgres;

--
-- Name: materia_id_materia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE materia_id_materia_seq OWNED BY materia.id_materia;


--
-- Name: materiaestudiante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE materiaestudiante (
    id_estudiante character varying(15) NOT NULL,
    id_materia integer,
    id_year character varying(10),
    id_grado character varying(15)
);


ALTER TABLE public.materiaestudiante OWNER TO postgres;

--
-- Name: notasfinales; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE notasfinales (
    id_estudiante character varying(15),
    valor numeric,
    desempeno character varying(20),
    id_year character varying(10),
    id_grado character varying(15),
    id_materia integer
);


ALTER TABLE public.notasfinales OWNER TO postgres;

--
-- Name: notasperiodo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE notasperiodo (
    id_estudiante character varying(15),
    id_grado character varying(15),
    valor numeric,
    id_periodo character varying(2),
    id_year character varying(10),
    id_materia integer,
    desempeno character varying(20),
    mejora character varying(2)
);


ALTER TABLE public.notasperiodo OWNER TO postgres;

--
-- Name: padre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE padre (
    nombres character varying(50) NOT NULL,
    apellidos character varying(50) NOT NULL,
    nacimiento character varying(10),
    id_padre character varying(15) NOT NULL,
    direccion_casa character varying(50) NOT NULL,
    celular character varying(15),
    correo character varying(50) NOT NULL,
    estrato character varying(2),
    nivel_academico character varying(20),
    profesion character varying(20),
    empresa character varying(50),
    cargo character varying(50),
    direccion_laboral character varying(50),
    telefono_laboral character varying(15),
    telefono_casa character varying(15),
    barrio character varying(50),
    id_usuario character varying(3),
    id_imagen character varying(50),
    clave character varying(100)
);


ALTER TABLE public.padre OWNER TO postgres;

--
-- Name: parciales; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE parciales (
    numero_nota numeric,
    id_grado character varying(15),
    nombre character varying(20),
    id_periodo character varying(2),
    porcentaje numeric,
    id_year character varying(10),
    id_materia integer
);


ALTER TABLE public.parciales OWNER TO postgres;

--
-- Name: periodo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE periodo (
    id_periodo character varying(2) NOT NULL,
    nombre character varying(10)
);


ALTER TABLE public.periodo OWNER TO postgres;

--
-- Name: profesor; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE profesor (
    id_profesor character varying(15) NOT NULL,
    nombre character varying(40) NOT NULL,
    apellido character varying(40) NOT NULL,
    telefono1 character varying(20),
    celular1 character varying(20),
    direccion character varying(40),
    correo character varying(50),
    id_usuario character varying(3),
    clave character varying(100),
    barrio character varying(50),
    id_year character varying(10),
    id_imagen character varying(100)
);


ALTER TABLE public.profesor OWNER TO postgres;

--
-- Name: profesormateria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE profesormateria (
    id_profesor character varying(15) NOT NULL,
    id_materia integer,
    id_year character varying(10),
    id_grado character varying(15)
);


ALTER TABLE public.profesormateria OWNER TO postgres;

--
-- Name: recomendaciones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE recomendaciones (
    texto character varying(200) NOT NULL,
    id_estudiante character varying(15) NOT NULL,
    id_profesor character varying(15),
    fecha character varying(10),
    id_year character varying(10),
    id_comentario integer NOT NULL
);


ALTER TABLE public.recomendaciones OWNER TO postgres;

--
-- Name: recomendaciones_id_comentario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recomendaciones_id_comentario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recomendaciones_id_comentario_seq OWNER TO postgres;

--
-- Name: recomendaciones_id_comentario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE recomendaciones_id_comentario_seq OWNED BY recomendaciones.id_comentario;


--
-- Name: resulparciales; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE resulparciales (
    id_estudiante character varying(15),
    id_grado character varying(15),
    nombre_nota character varying(20),
    valor numeric,
    porcentaje numeric,
    id_periodo character varying(2),
    id_year character varying(10),
    id_materia integer
);


ALTER TABLE public.resulparciales OWNER TO postgres;

SET default_with_oids = true;

--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    id_usuario character varying(3) NOT NULL,
    nombre character varying(20)
);


ALTER TABLE public.usuario OWNER TO postgres;

SET default_with_oids = false;

--
-- Name: year; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE year (
    id_year character varying(10) NOT NULL
);


ALTER TABLE public.year OWNER TO postgres;

--
-- Name: id_archivo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivos ALTER COLUMN id_archivo SET DEFAULT nextval('archivos_id_archivo_seq'::regclass);


--
-- Name: id_materia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materia ALTER COLUMN id_materia SET DEFAULT nextval('materia_id_materia_seq'::regclass);


--
-- Name: id_comentario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recomendaciones ALTER COLUMN id_comentario SET DEFAULT nextval('recomendaciones_id_comentario_seq'::regclass);


--
-- Data for Name: acudiente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY acudiente (id_acudiente, nombre, telefono1, parentesco) FROM stdin;
5555710	neftaly	3152839530	nono
2323	gfg	989	gfg
123456	Lola xiomara	6553073	tia
2121	James rodriguez	76767	tio
\.


--
-- Data for Name: archivos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY archivos (id_grado, titulo, tamano, nombre, id_year, tipo, id_archivo, id_materia, id_profesor) FROM stdin;
1	tarea1	291268	capitulo5_ingeco.rtf	2017	application/msword	9	17	p1
1	taller3	13159	cifrado_secur27.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	11	17	p1
1	taller2	291268	capitulo5_ingeco.rtf	2017	application/msword	10	17	p1
1	trabajo de grado	437739	fun.pdf	2017	application/pdf	14	13	\N
1	taller4	20231	1.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	15	17	\N
1	proyecto	79736	evaluacion docente.JPG	2017	image/jpeg	16	17	\N
1	proyecto	79736	evaluacion docente.JPG	2017	image/jpeg	17	17	\N
1	proyecto	79736	evaluacion docente.JPG	2017	image/jpeg	18	17	\N
1	proyecto	79736	evaluacion docente.JPG	2017	image/jpeg	19	17	\N
1	proyecto	79736	evaluacion docente.JPG	2017	image/jpeg	20	17	\N
1	new file	13159	cifrado_secur27.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	21	17	p4
1	hola	24203	etabs1.xlsm	2017	application/vnd.ms-excel.sheet.macroEnabled.12	22	17	p4
1	test1	291268	capitulo5_ingeco.rtf	2017	application/msword	23	16	p4
1	wordtest	13159	cifrado_secur27.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	24	17	p4
1	securyti	13513	seguridad_algo2.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	25	17	p4
2	cherry7	104369	Dated Class Shedule.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	26	17	p4
2	cerry27	80449	diapositivas expo.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	27	7	p4
1	word16	11837	Hola probando el Word 16.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	28	17	p4
1	word16	11837	Hola probando el Word 16.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	29	17	p4
1	pro	12833	audio_proyecto_simulacion.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	30	4	p4
2	karen	379858	cristian.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	31	17	p4
2	karen2	20231	1.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	32	7	p4
3	probando	14516	derivas1.xlsx	2017	application/vnd.openxmlformats-officedocument.spreadsheetml.sheet	33	18	p4
3	karen4	27382	final2.xlsm	2017	application/vnd.ms-excel.sheet.macroEnabled.12	34	18	p4
1	nokia2	13159	cifrado_secur27.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	36	1	p4
1	probando	81306	10000 simulaciones.JPG	2017	image/jpeg	37	1	p4
1	probando 25-09-17	85497	nico.jpg	2017	image/jpeg	38	9	p4
1	probando2	40073	foto vieja.jpg	2017	image/jpeg	39	9	p4
1	probando 	12833	audio_proyecto_simulacion.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	40	1	p4
1	material de clase 1	20231	trabajo de matematicas.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	41	18	p4
1	material de calse 2	17750	factorial.xlsm	2017	application/vnd.ms-excel.sheet.macroEnabled.12	42	18	p4
1	30 octubre	7148	jorge2	2017	application/octet-stream	43	14	p4
1	30 octubre	7148	jorge2	2017	application/octet-stream	44	14	p4
1	tarea de tecnologia	291268	capitulo5_ingeco.rtf	2017	application/msword	45	9	p4
1	ingles2	24203	etabs1.xlsm	2017	application/vnd.ms-excel.sheet.macroEnabled.12	13	16	13872
1	ingles	379858	cristian.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	12	16	13872
2	Tarea de lectura	15517	teoria grado 2.docx	2017	application/vnd.openxmlformats-officedocument.wordprocessingml.document	46	14	7711
\.


--
-- Name: archivos_id_archivo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('archivos_id_archivo_seq', 46, true);


--
-- Data for Name: estudiante; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY estudiante (id_estudiante, nombre, apellido, telefono1, celular1, direccion, id_acudiente, id_grado, correo, apellido2, id_imagen, clave, id_usuario, id_padre, id_madre, alergias, sisben, situacion, nombre2, genero, sangre, place, edad, tipo, departamento, municipio, barrio, estrato, puntaje, id_year, born) FROM stdin;
991030	Karen	Ortiz	6553073	3114597083	manzana a casa 5	2323	2	jcj@hotmial.com	Garavito	img/avatar.png	991030	1	8910	nulo	no	si	otros	Dayana	femenino	AN	Floridabalanca	12	TI	santader	Floridablanca                           	bariloche	2	1	2017	\N
8911	Marcos	Gonzales	767	6767	767	2323	1	767	Ramirez	img/juan.jpg	8911	1	11023706372	891027	u	u	u	u	u	u	u	23	u	hgh	hgh                                     	hgh	g	g	2017	\N
8912	Katerine	Sierra	656	656	656	5555710	1	65656	656	img/silvia.jpg	8912	1	11023706372	891027	uyu	3	3	3	3	3	3	3	3	3	3                                       	3	3	3	2017	\N
8914	Juan	Garcia	656	656	656	2121	1	uyu	yuy	img/alberto.jpg	8914	1	11023706372	891027	7	7	7	7	7	7	7	7	7	7	7                                       	7	7	7	2017	\N
991031	Liseth	Rueda	6553073	3114597083	manzana a casa 5	2323	2	jcj@hotmial.com	Rojas	img/avatar.png	991031	1	8910	nulo	no	si	otros	Katerine	masculino	AN	Floridabalanca	12	TI	santader	Floridablanca                           	bariloche	1	1	2017	\N
8913	Camila	Puerta	54	545	54	2323	1	jcjcaballerog@gmail.com	yty	img/dominga.jpg	8913	1	11023706372	891027	7	7	7	7	7	7	7	7	7	7	7                                       	7	7	7	2017	\N
991032	Andres	Perez	6553073	3114597083	manzana a casa 5	2323	2	jcj@hotmial.com	Garcia	img/avatar.png	991032	1	8910	nulo	no	si	otros	Camilo	masculino	A	Floridabalanca	12	TI	floridablanca	Floridablanca                           	bariloche	1	1	2017	\N
991033	karol	Salcedo	6553073	3114597083	manzana a casa 5	2323	2	jcj@hotmial.com	Acuña	img/avatar.png	991033	1	8910	nulo	no	si	otros	Natalia	femenino	B	Floridabalanca	11	TI	santader	Floridablanca                           	bariloche	1	1	2017	\N
8910	Jonathan	Caballero	3125	1212	mz a casa 5	2121	1	jcjcaballero@hotmail.com	Jaimes	img/jonathan.jpg	891127	1	11023706372	891027	nada	si	otros	mao	m	o	nb	28	o	santander	floridablanca                           	bariloche	3	bvb	2017	1989-10-27
991028	Johan	Perez	3152839560	21212	manzana a casa 5	2323	2	jcj@hotmial.com	Bastos	img/avatar.png	991028	1	5710277	nulo	no	si	otros	sebastian	masculino	A	Floridabalanca	11	TI	santader	Floridablanca                           	bariloche	1	2	2017	\N
991029	Yeison	Perez	3152839560	32656	manzana a casa 5	2323	2	jcj@hotmial.com	Camacho	img/avatar.png	991029	1	5710277	nulo	no	si	otros	Eduardo	femenino	A	Floridabalanca	12	TI	santander	Floridablanca                           	bariloche	1	1	2017	\N
991027	Juan	Perez	3152839560	32656	manzana a casa 5	2323	2	jcj@hotmial.com	Roa	img/young.jpg	991027	1	5710277	nulo	no	si	otros	David	masculino	A	Floridabalanca	11	TI	santander	Floridablanca                           	bariloche	1	2	2017	\N
\.


--
-- Data for Name: grado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY grado (id_grado, nombre_grado) FROM stdin;
1	Primero
2	Segundo
3	Tercero
4	Cuarto
5	Quinto
6	Sexto
7	Septimo
8	Octavo
9	Noveno
10	Decimo
11	Once
\.


--
-- Data for Name: gradomateria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY gradomateria (id_grado, id_year, id_materia) FROM stdin;
2	2017	3
2	2017	4
2	2017	5
2	2017	6
2	2017	7
2	2017	8
2	2017	10
2	2017	11
2	2017	12
2	2017	14
2	2017	15
2	2017	16
2	2017	17
2	2017	18
2	2017	19
2	2017	9
2	2017	13
2	2017	29
1	2017	1
1	2017	2
1	2017	3
1	2017	4
1	2017	5
1	2017	6
1	2017	7
1	2017	8
1	2017	10
1	2017	11
1	2017	12
1	2017	14
1	2017	15
1	2017	16
1	2017	17
1	2017	18
1	2017	19
1	2017	9
1	2017	13
3	2017	1
3	2017	4
3	2017	5
3	2017	6
3	2017	7
3	2017	8
3	2017	11
3	2017	12
3	2017	13
3	2017	14
3	2017	15
3	2017	16
3	2017	17
3	2017	18
3	2017	9
4	2017	1
4	2017	4
4	2017	5
4	2017	6
4	2017	7
4	2017	8
4	2017	11
4	2017	12
4	2017	13
4	2017	15
4	2017	16
4	2017	17
4	2017	18
4	2017	9
5	2017	1
5	2017	2
5	2017	3
11	2017	1
11	2017	2
11	2017	3
11	2017	4
11	2017	5
11	2017	6
11	2017	7
11	2017	8
11	2017	10
11	2017	12
11	2017	14
11	2017	15
11	2017	16
11	2017	17
11	2017	18
11	2017	19
11	2017	9
10	2017	1
10	2017	2
10	2017	3
10	2017	4
10	2017	5
10	2017	6
10	2017	7
10	2017	8
10	2017	15
10	2017	16
10	2017	17
10	2017	18
10	2017	19
10	2017	9
10	2017	13
10	2017	29
9	2017	1
9	2017	2
9	2017	3
9	2017	4
9	2017	5
9	2017	6
9	2017	7
9	2017	8
9	2017	10
9	2017	11
9	2017	12
9	2017	14
9	2017	15
9	2017	16
9	2017	17
9	2017	18
9	2017	19
8	2017	1
8	2017	2
8	2017	3
8	2017	4
8	2017	5
8	2017	6
8	2017	7
8	2017	8
8	2017	10
8	2017	11
8	2017	12
8	2017	14
8	2017	15
8	2017	16
8	2017	17
8	2017	29
6	2017	1
6	2017	2
6	2017	7
6	2017	8
6	2017	10
6	2017	11
6	2017	12
6	2017	14
6	2017	15
6	2017	16
6	2017	17
6	2017	18
6	2017	19
6	2017	9
6	2017	13
6	2017	29
1	2017	29
7	2017	35
7	2017	1
7	2017	3
7	2017	4
7	2017	5
\.


--
-- Data for Name: imagen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY imagen (id_imagen) FROM stdin;
img/student.jpg
img/jonathan.jpg
img/silvia.jpg
img/avatar.png
img/viejo.jpg
img/dominga.jpg
img/nico.jpg
img/loco.jpg
img/locos.jpg
img/foto uis.JPG
img/foto_uis.JPG
img/snapshot (2).jpg
img/primo2.jpg
img/snapshot(4).jpg
img/foto vieja.jpg
img/homero-simpson-gafas.jpg
img/fotovieja.jpg
img/snapshot(2).jpg
img/InstagramCapture_7fee5a0d-d76f-4945-a413-f1b0c10d7957.jpg
img/primos.jpg
img/marcela.jpg
img/juan.jpg
img/alberto.jpg
img/secre.jpg
img/jonathancaballero.jpg
img/jonathan3.jpg
img/photouis.JPG
img/alberto.JPG
img/6.jpg
img/profe.jpg
img/padre.jpg
img/admin.jpg
img/young.jpg
\.


--
-- Data for Name: madre; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY madre (nombres, apellidos, nacimiento, id_madre, direccion_casa, celular, correo, estrato, nivel_academico, profesion, empresa, cargo, direccion_laboral, telefono_laboral, telefono_casa, barrio, id_usuario, id_imagen, clave) FROM stdin;
mafe	acevedo	1995-10-24	891027	manzana a	3114597083	jcj@hotmai.com	6	profesional	ingeniera	open	directora	calle 15	6553073	6778990	cabacera	6	img/jonathan3.jpg	89102762607
nulo	nulo	nulo	nulo	nulo	nulo	nulo	3	nulo	nulo	nulo	nulo	nulo	nulo	nulo	nulo	6	img/avatar.png	nulo
\.


--
-- Data for Name: materia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY materia (nombre_mate, id_materia) FROM stdin;
Etica ciudadana	35
Biologia 2	1
Fisica	2
Quimica	3
Fisicoquimica	4
Sociales	5
Geografia	6
Filosofia	7
Artistica	8
Etica y proyecto de vida 	10
Catedra de la paz	11
Dirección de grupo	12
Español	14
Plan Lector	15
Plan Escritor	16
Ingles	17
Matematicas	18
Tecnologia	19
Informatica	9
Educación fisica	13
programacion oo	29
\.


--
-- Name: materia_id_materia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('materia_id_materia_seq', 35, true);


--
-- Data for Name: materiaestudiante; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY materiaestudiante (id_estudiante, id_materia, id_year, id_grado) FROM stdin;
991027	3	2017	2
991027	4	2017	2
991027	5	2017	2
991027	6	2017	2
991027	7	2017	2
991027	8	2017	2
991027	10	2017	2
991027	11	2017	2
991027	12	2017	2
991027	14	2017	2
991027	15	2017	2
991027	16	2017	2
991027	17	2017	2
991027	18	2017	2
991027	19	2017	2
991027	9	2017	2
991027	13	2017	2
991027	29	2017	2
991028	3	2017	2
991028	4	2017	2
991028	5	2017	2
991028	6	2017	2
991028	7	2017	2
991028	8	2017	2
991028	10	2017	2
991028	11	2017	2
991028	12	2017	2
991028	14	2017	2
991028	15	2017	2
991028	16	2017	2
991028	17	2017	2
991028	18	2017	2
991028	19	2017	2
991028	9	2017	2
991028	13	2017	2
991028	29	2017	2
991029	3	2017	2
991029	4	2017	2
991029	5	2017	2
991029	6	2017	2
991029	7	2017	2
991029	8	2017	2
991029	10	2017	2
991029	11	2017	2
991029	12	2017	2
991029	14	2017	2
991029	15	2017	2
991029	16	2017	2
991029	17	2017	2
991029	18	2017	2
991029	19	2017	2
991029	9	2017	2
991029	13	2017	2
991029	29	2017	2
991030	3	2017	2
991030	4	2017	2
991030	5	2017	2
991030	6	2017	2
991030	7	2017	2
991030	8	2017	2
991030	10	2017	2
991030	11	2017	2
991030	12	2017	2
991030	14	2017	2
991030	15	2017	2
991030	16	2017	2
991030	17	2017	2
991030	18	2017	2
991030	19	2017	2
991030	9	2017	2
991030	13	2017	2
991030	29	2017	2
991031	3	2017	2
991031	4	2017	2
991031	5	2017	2
991031	6	2017	2
991031	7	2017	2
991031	8	2017	2
991031	10	2017	2
991031	11	2017	2
991031	12	2017	2
991031	14	2017	2
991031	15	2017	2
991031	16	2017	2
991031	17	2017	2
991031	18	2017	2
991031	19	2017	2
991031	9	2017	2
991031	13	2017	2
991031	29	2017	2
991031	3	2017	2
991031	4	2017	2
991031	5	2017	2
991031	6	2017	2
991031	7	2017	2
991031	8	2017	2
991031	10	2017	2
991031	11	2017	2
991031	12	2017	2
991031	14	2017	2
991031	15	2017	2
991031	16	2017	2
991031	17	2017	2
991031	18	2017	2
991031	19	2017	2
991031	9	2017	2
991031	13	2017	2
991031	29	2017	2
991032	3	2017	2
991032	4	2017	2
991032	5	2017	2
991032	6	2017	2
991032	7	2017	2
991032	8	2017	2
991032	10	2017	2
991032	11	2017	2
991032	12	2017	2
991032	14	2017	2
991032	15	2017	2
991032	16	2017	2
991032	17	2017	2
991032	18	2017	2
991032	19	2017	2
991032	9	2017	2
991032	13	2017	2
991032	29	2017	2
991033	3	2017	2
991033	4	2017	2
991033	5	2017	2
991033	6	2017	2
991033	7	2017	2
991033	8	2017	2
991033	10	2017	2
991033	11	2017	2
991033	12	2017	2
991033	14	2017	2
991033	15	2017	2
991033	16	2017	2
991033	17	2017	2
991033	18	2017	2
991033	19	2017	2
991033	9	2017	2
991033	13	2017	2
991033	29	2017	2
\.


--
-- Data for Name: notasfinales; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY notasfinales (id_estudiante, valor, desempeno, id_year, id_grado, id_materia) FROM stdin;
\.


--
-- Data for Name: notasperiodo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY notasperiodo (id_estudiante, id_grado, valor, id_periodo, id_year, id_materia, desempeno, mejora) FROM stdin;
8910	1	3.40	2	2017	17	\N	\N
8911	1	3.40	2	2017	17	\N	\N
8912	1	4.50	2	2017	17	\N	\N
8913	1	4.50	2	2017	17	\N	\N
8914	1	4.50	2	2017	17	\N	\N
8910	1	3.50	3	2017	17	\N	\N
8911	1	4.00	3	2017	17	\N	\N
8912	1	4.00	3	2017	17	\N	\N
8913	1	3.35	3	2017	17	\N	\N
8914	1	4.20	3	2017	17	\N	\N
8910	1	4.40	1	2017	17	\N	\N
8911	1	3.4	1	2017	17	\N	1
8912	1	3.3	1	2017	17	\N	1
8913	1	3.70	1	2017	17	\N	\N
8914	1	3.70	1	2017	17	\N	\N
8910	1	3.84	4	2017	17	\N	\N
8911	1	3.48	4	2017	17	\N	\N
8912	1	3.50	4	2017	17	\N	\N
8913	1	3.33	4	2017	17	\N	1
8914	1	2.6	4	2017	17	\N	1
991027	2	4.50	1	2017	14	\N	\N
991028	2	3.70	1	2017	14	\N	\N
991029	2	3.80	1	2017	14	\N	\N
991030	2	3.60	1	2017	14	\N	\N
991031	2	4.50	1	2017	14	\N	\N
991032	2	3.70	1	2017	14	\N	\N
991033	2	3.8	1	2017	14	\N	\N
\.


--
-- Data for Name: padre; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY padre (nombres, apellidos, nacimiento, id_padre, direccion_casa, celular, correo, estrato, nivel_academico, profesion, empresa, cargo, direccion_laboral, telefono_laboral, telefono_casa, barrio, id_usuario, id_imagen, clave) FROM stdin;
nulo	nulo		nulo	nulo	nulo	nulo	0	nulo	nulo	nulo	nulo	nulo	nulo	nulo	nulo	2	img/avatar.png	\N
rer	rer	2017-06-05	rer	rer	rer	rer	4	rer	rer	rer	rer	rer	rer	rer	rer	2	img/avatar.png	\N
Pedro	caballero jaimes	1989-10-27	11023706372	bariloche mz a casa 5	3114597083	jcj@hotmial.com	4	profesional	ingeniero sistemas	halliburton	gerente	norte de bogota	655	6553073	bariloche	2	img/6.jpg	123456uis
Juan	perez	12-2-2	5710277	gfg	gfg	gfg	1	gf	gfg	gfg	gfg	gfg	gfg	gfg	gfg	2	img/padre.jpg	5710277
Marlon	Martinez	1980-06-05	8910	calle 56 # 34-56	3152839530	padre@hotmail.com	3	Magister	ingeniro	Ecopetrol	gerente	calle 45 e 72	6557876	6553073	cabecera	2	img/avatar.png	891027
\.


--
-- Data for Name: parciales; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY parciales (numero_nota, id_grado, nombre, id_periodo, porcentaje, id_year, id_materia) FROM stdin;
1	1	nota1	2	50	2017	17
2	1	nota2	2	50	2017	17
1	1	nota1	3	50	2017	17
2	1	nota2	3	50	2017	17
1	1	talleres	4	20	2017	17
2	1	expos	4	20	2017	17
3	1	previo 1	4	20	2017	17
4	1	acumulativa	4	40	2017	17
1	2	taller1	1	20	2017	14
2	2	Parcial 1	1	20	2017	14
3	2	Parcial 2	1	20	2017	14
4	2	Acumulativa	1	40	2017	14
1	1	tareas	1	30	2017	17
2	1	taller2	1	30	2017	17
3	1	final	1	40	2017	17
\.


--
-- Data for Name: periodo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY periodo (id_periodo, nombre) FROM stdin;
1	Primero
2	Segundo
3	Tercero
4	Cuarto
\.


--
-- Data for Name: profesor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY profesor (id_profesor, nombre, apellido, telefono1, celular1, direccion, correo, id_usuario, clave, barrio, id_year, id_imagen) FROM stdin;
271127	Tomas	Puerta	6553073	3114597083	manzana a casa 5	profe@hotmail.com	3	271127	bariloche	2017	img/avatar.png
21300	admin	caballero	911	911	calle 27	jcj@hotmail.com	5	89102762607	cumbre	2017	img/admin.jpg
p3	Jonnathan	Caballero	6553073	3114597083	mz a bariloche	jcjcaballero@hotmail.com	3	p3	\N	2017	img/jonathan.jpg
p4	Marcela	carvajal	54545	5454	rerer	jcj@hotmial.com	3	89102762607uis	rerer	2017	img/marcela.jpg
p1	alberto	macias	315283	315283	calle 29	macias@hotmail.com	3	p1	\N	2017	img/alberto.jpg
6969	camilo	perez	6553073	3114597083	manzana a casa 5	jcj@hotmial.com	3	6969	bariloche	2017	img/avatar.png
13872	Maria	Gonsalez	312445	312445	calle 34	leonel@parra	4	123456	\N	2017	img/secre.jpg
7711	Pablo	Martinez	6553073	3114597083	manzana a casa 5	jcj@hotmial.com	3	7711	bariloche	2017	img/profe.jpg
123456	Camila	Castellanos	3152839560	454545454	calle 45	jcj@hotmial.com	3	1234567	cumbre	2017	img/jonathancaballero.jpg
\.


--
-- Data for Name: profesormateria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY profesormateria (id_profesor, id_materia, id_year, id_grado) FROM stdin;
p4	17	2017	5
p4	17	2017	6
p4	17	2017	7
p4	17	2017	8
p4	17	2017	9
p4	17	2017	10
p4	17	2017	11
p3	18	2017	1
p3	18	2017	2
p3	18	2017	3
p4	17	2017	1
p3	19	2017	1
p3	19	2017	2
p3	19	2017	3
p3	19	2017	4
p3	19	2017	5
p3	19	2017	6
p3	19	2017	7
p3	19	2017	8
p3	19	2017	9
p3	19	2017	10
p3	19	2017	11
123456	11	2017	1
123456	11	2017	2
123456	11	2017	3
123456	11	2017	4
123456	11	2017	5
6969	18	2017	1
6969	18	2017	2
6969	18	2017	3
6969	18	2017	4
6969	18	2017	5
6969	9	2017	1
7711	14	2017	1
7711	14	2017	2
7711	14	2017	3
7711	14	2017	4
7711	14	2017	5
p1	19	2018	6
p1	19	2018	7
p1	19	2018	8
p1	19	2018	9
p1	19	2018	10
p1	19	2018	11
\.


--
-- Data for Name: recomendaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recomendaciones (texto, id_estudiante, id_profesor, fecha, id_year, id_comentario) FROM stdin;
hola esta es un PRUEBA.	8910	p4	2017-10-31	2017	54
hola esta es un PRUEBA.	8913	p4	2017-10-31	2017	55
hola esta es un PRUEBA.	8910	p4	2017-10-31	2017	56
hola esta es un PRUEBA.	8913	p4	2017-10-31	2017	57
hoy 9 de noviembre no cumplieron con el trabajo de matematicas.	8913	p4	2017-11-09	2017	58
hoy 9 de noviembre no cumplieron con el trabajo de matematicas.	8910	p4	2017-11-09	2017	59
El estudiante debe mejorar su comportamiento en clase, y mejorar con la responsabilidad de los trabajos de español, Gracias.	991027	7711	2017-11-10	2017	60
El estudiante llego tarde el día de ayer a clase y este comportamiento se repite muy seguido, por favor tratar de mejorar esta situación.	991027	7711	2017-11-10	2017	61
\.


--
-- Name: recomendaciones_id_comentario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recomendaciones_id_comentario_seq', 61, true);


--
-- Data for Name: resulparciales; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY resulparciales (id_estudiante, id_grado, nombre_nota, valor, porcentaje, id_periodo, id_year, id_materia) FROM stdin;
8910	1	1	3.4	30	1	2017	17
8910	1	2	3.4	30	1	2017	17
8910	1	3	3.4	40	1	2017	17
8911	1	1	2.7	30	1	2017	17
8911	1	2	2.7	30	1	2017	17
8911	1	3	2.7	40	1	2017	17
8912	1	1	2.9	30	1	2017	17
8912	1	2	2.9	30	1	2017	17
8912	1	3	2.9	40	1	2017	17
8913	1	1	3.7	30	1	2017	17
8913	1	2	3.7	30	1	2017	17
8913	1	3	3.7	40	1	2017	17
8914	1	1	3.7	30	1	2017	17
8914	1	2	3.7	30	1	2017	17
8914	1	3	3.7	40	1	2017	17
8910	1	1	3.4	50	2	2017	17
8910	1	2	3.4	50	2	2017	17
8911	1	1	3.4	50	2	2017	17
8911	1	2	3.4	50	2	2017	17
8912	1	1	4.5	50	2	2017	17
8912	1	2	4.5	50	2	2017	17
8913	1	1	4.5	50	2	2017	17
8913	1	2	4.5	50	2	2017	17
8914	1	1	4.5	50	2	2017	17
8914	1	2	4.5	50	2	2017	17
8910	1	1	3.5	50	3	2017	17
8910	1	2	3.5	50	3	2017	17
8911	1	1	4.5	50	3	2017	17
8911	1	2	3.5	50	3	2017	17
8912	1	1	4.5	50	3	2017	17
8912	1	2	3.5	50	3	2017	17
8913	1	1	2.2	50	3	2017	17
8913	1	2	4.5	50	3	2017	17
8914	1	1	3.4	50	3	2017	17
8914	1	2	5	50	3	2017	17
8910	1	1	3.4	20	4	2017	17
8910	1	2	3.4	20	4	2017	17
8910	1	3	3.4	20	4	2017	17
8910	1	4	4.5	40	4	2017	17
8911	1	1	3.8	20	4	2017	17
8911	1	2	3.4	20	4	2017	17
8911	1	3	3.4	20	4	2017	17
8911	1	4	3.4	40	4	2017	17
8912	1	1	3.9	20	4	2017	17
8912	1	2	3.4	20	4	2017	17
8912	1	3	3.4	20	4	2017	17
8912	1	4	3.4	40	4	2017	17
8913	1	1	2.7	20	4	2017	17
8913	1	2	2.7	20	4	2017	17
8913	1	3	2.6	20	4	2017	17
8913	1	4	2.9	40	4	2017	17
8914	1	1	2.5	20	4	2017	17
8914	1	2	2.5	20	4	2017	17
8914	1	3	2.7	20	4	2017	17
8914	1	4	3.0	40	4	2017	17
991027	2	1	3.5	20	1	2017	14
991027	2	2	3.5	20	1	2017	14
991027	2	3	3.5	20	1	2017	14
991027	2	4	3.5	40	1	2017	14
991028	2	1	3.7	20	1	2017	14
991028	2	2	3.7	20	1	2017	14
991028	2	3	3.7	20	1	2017	14
991028	2	4	3.7	40	1	2017	14
991029	2	1	3.8	20	1	2017	14
991029	2	2	3.8	20	1	2017	14
991029	2	3	3.8	20	1	2017	14
991029	2	4	3.8	40	1	2017	14
991030	2	1	3.6	20	1	2017	14
991030	2	2	3.6	20	1	2017	14
991030	2	3	3.6	20	1	2017	14
991030	2	4	3.6	40	1	2017	14
991031	2	1	4.5	20	1	2017	14
991031	2	2	4.5	20	1	2017	14
991031	2	3	4.5	20	1	2017	14
991031	2	4	4.5	40	1	2017	14
991032	2	1	3.7	20	1	2017	14
991032	2	2	3.7	20	1	2017	14
991032	2	3	3.7	20	1	2017	14
991032	2	4	3.7	40	1	2017	14
991033	2	1	3.7	20	1	2017	14
991033	2	2	3.7	20	1	2017	14
991033	2	3	3.7	20	1	2017	14
991033	2	4	3.9	40	1	2017	14
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuario (id_usuario, nombre) FROM stdin;
1	Estudiante
3	Profesor
4	Secretaria
5	Administrador
2	Padre
6	madre
\.


--
-- Data for Name: year; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY year (id_year) FROM stdin;
2017
2018
2019
2020
2021
2022
2023
2024
2025
2026
2027
\.


--
-- Name: acudiente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY acudiente
    ADD CONSTRAINT acudiente_pkey PRIMARY KEY (id_acudiente);


--
-- Name: archivos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY archivos
    ADD CONSTRAINT archivos_pkey PRIMARY KEY (id_archivo);


--
-- Name: estudiante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_pkey PRIMARY KEY (id_estudiante);


--
-- Name: grado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY grado
    ADD CONSTRAINT grado_pkey PRIMARY KEY (id_grado);


--
-- Name: imagen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY imagen
    ADD CONSTRAINT imagen_pkey PRIMARY KEY (id_imagen);


--
-- Name: madre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY madre
    ADD CONSTRAINT madre_pkey PRIMARY KEY (id_madre);


--
-- Name: materia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY materia
    ADD CONSTRAINT materia_pkey PRIMARY KEY (id_materia);


--
-- Name: padre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY padre
    ADD CONSTRAINT padre_pkey PRIMARY KEY (id_padre);


--
-- Name: periodo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY periodo
    ADD CONSTRAINT periodo_pkey PRIMARY KEY (id_periodo);


--
-- Name: profesor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_pkey PRIMARY KEY (id_profesor);


--
-- Name: recomendaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY recomendaciones
    ADD CONSTRAINT recomendaciones_pkey PRIMARY KEY (id_comentario);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: year_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY year
    ADD CONSTRAINT year_pkey PRIMARY KEY (id_year);


--
-- Name: archivos_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivos
    ADD CONSTRAINT archivos_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: archivos_id_materia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivos
    ADD CONSTRAINT archivos_id_materia_fkey FOREIGN KEY (id_materia) REFERENCES materia(id_materia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: archivos_id_profesor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivos
    ADD CONSTRAINT archivos_id_profesor_fkey FOREIGN KEY (id_profesor) REFERENCES profesor(id_profesor) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: archivos_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivos
    ADD CONSTRAINT archivos_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_id_acudiente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_id_acudiente_fkey FOREIGN KEY (id_acudiente) REFERENCES acudiente(id_acudiente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_id_imagen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_id_imagen_fkey FOREIGN KEY (id_imagen) REFERENCES imagen(id_imagen) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_id_madre_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_id_madre_fkey FOREIGN KEY (id_madre) REFERENCES madre(id_madre) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_id_padre_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_id_padre_fkey FOREIGN KEY (id_padre) REFERENCES padre(id_padre) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: gradomateria_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gradomateria
    ADD CONSTRAINT gradomateria_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: gradomateria_id_materia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gradomateria
    ADD CONSTRAINT gradomateria_id_materia_fkey FOREIGN KEY (id_materia) REFERENCES materia(id_materia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: gradomateria_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gradomateria
    ADD CONSTRAINT gradomateria_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: madre_id_imagen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY madre
    ADD CONSTRAINT madre_id_imagen_fkey FOREIGN KEY (id_imagen) REFERENCES imagen(id_imagen) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: madre_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY madre
    ADD CONSTRAINT madre_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: materiaestudiante_id_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiaestudiante
    ADD CONSTRAINT materiaestudiante_id_estudiante_fkey FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: materiaestudiante_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiaestudiante
    ADD CONSTRAINT materiaestudiante_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: materiaestudiante_id_materia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiaestudiante
    ADD CONSTRAINT materiaestudiante_id_materia_fkey FOREIGN KEY (id_materia) REFERENCES materia(id_materia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: materiaestudiante_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiaestudiante
    ADD CONSTRAINT materiaestudiante_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasfinales_id_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasfinales
    ADD CONSTRAINT notasfinales_id_estudiante_fkey FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasfinales_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasfinales
    ADD CONSTRAINT notasfinales_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasfinales_id_materia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasfinales
    ADD CONSTRAINT notasfinales_id_materia_fkey FOREIGN KEY (id_materia) REFERENCES materia(id_materia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasfinales_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasfinales
    ADD CONSTRAINT notasfinales_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasperiodo_id_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasperiodo
    ADD CONSTRAINT notasperiodo_id_estudiante_fkey FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasperiodo_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasperiodo
    ADD CONSTRAINT notasperiodo_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasperiodo_id_materia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasperiodo
    ADD CONSTRAINT notasperiodo_id_materia_fkey FOREIGN KEY (id_materia) REFERENCES materia(id_materia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasperiodo_id_periodo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasperiodo
    ADD CONSTRAINT notasperiodo_id_periodo_fkey FOREIGN KEY (id_periodo) REFERENCES periodo(id_periodo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: notasperiodo_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notasperiodo
    ADD CONSTRAINT notasperiodo_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: padre_id_imagen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY padre
    ADD CONSTRAINT padre_id_imagen_fkey FOREIGN KEY (id_imagen) REFERENCES imagen(id_imagen) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: padre_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY padre
    ADD CONSTRAINT padre_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: parciales_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parciales
    ADD CONSTRAINT parciales_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: parciales_id_materia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parciales
    ADD CONSTRAINT parciales_id_materia_fkey FOREIGN KEY (id_materia) REFERENCES materia(id_materia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: parciales_id_periodo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parciales
    ADD CONSTRAINT parciales_id_periodo_fkey FOREIGN KEY (id_periodo) REFERENCES periodo(id_periodo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: parciales_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parciales
    ADD CONSTRAINT parciales_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: profesor_id_imagen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_id_imagen_fkey FOREIGN KEY (id_imagen) REFERENCES imagen(id_imagen) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: profesor_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: profesor_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: profesormateria_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesormateria
    ADD CONSTRAINT profesormateria_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: profesormateria_id_materia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesormateria
    ADD CONSTRAINT profesormateria_id_materia_fkey FOREIGN KEY (id_materia) REFERENCES materia(id_materia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: profesormateria_id_profesor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesormateria
    ADD CONSTRAINT profesormateria_id_profesor_fkey FOREIGN KEY (id_profesor) REFERENCES profesor(id_profesor) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: profesormateria_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesormateria
    ADD CONSTRAINT profesormateria_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: recomendaciones_id_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recomendaciones
    ADD CONSTRAINT recomendaciones_id_estudiante_fkey FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: recomendaciones_id_profesor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recomendaciones
    ADD CONSTRAINT recomendaciones_id_profesor_fkey FOREIGN KEY (id_profesor) REFERENCES profesor(id_profesor) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: recomendaciones_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recomendaciones
    ADD CONSTRAINT recomendaciones_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: resulparciales_id_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resulparciales
    ADD CONSTRAINT resulparciales_id_estudiante_fkey FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: resulparciales_id_grado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resulparciales
    ADD CONSTRAINT resulparciales_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES grado(id_grado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: resulparciales_id_materia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resulparciales
    ADD CONSTRAINT resulparciales_id_materia_fkey FOREIGN KEY (id_materia) REFERENCES materia(id_materia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: resulparciales_id_periodo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resulparciales
    ADD CONSTRAINT resulparciales_id_periodo_fkey FOREIGN KEY (id_periodo) REFERENCES periodo(id_periodo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: resulparciales_id_year_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resulparciales
    ADD CONSTRAINT resulparciales_id_year_fkey FOREIGN KEY (id_year) REFERENCES year(id_year) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

