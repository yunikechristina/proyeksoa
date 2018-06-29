-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jun 2018 pada 12.32
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_soa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artis`
--

CREATE TABLE `artis` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artis`
--

INSERT INTO `artis` (`id`, `nama`) VALUES
(1, 'Robert Downey Jr.'),
(2, 'Chris Hemsworth'),
(3, 'Yunike Christina'),
(4, 'Odi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_artis`
--

CREATE TABLE `detail_artis` (
  `id` int(11) NOT NULL,
  `peran` varchar(50) NOT NULL,
  `id_artis` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_artis`
--

INSERT INTO `detail_artis` (`id`, `peran`, `id_artis`, `id_movie`) VALUES
(1, 'Tony Stark / Iron Man', 1, 1),
(2, 'Thor', 2, 1),
(3, 'Sherlock', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `tipe` text NOT NULL,
  `data` blob NOT NULL,
  `ukuran` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id`, `nama_file`, `tipe`, `data`, `ukuran`, `id_movie`) VALUES
(1, 'anguished.png', 'image/png', 0x6956424f5277304b476770634d4677775844414e53556845556c7777584442634d4368634d4677775844416f43414e634d4677775844433749456866584442634d414c395545785552567777584442634d4c746e45567777584442634d4f783145317777584442634d467777584442634d467777584442634d467777584442634d467777584442634d467777584442634d4f7030452b4a3746413048416653564773687445567777584442634d4a5a534465694a46317777584442634d4d4e7345746c7345567777584442634d4f647945752b4546345648444d466f45626469454e5a7745733575456d4d3143647433464e353446504b534773746f45567777584442634d45596d4275794c46375264446b346f4230456b426c5176434f7950474f6d4346664b59472b3938464f3935464f31304575787a45764f4d474f392f46647077456c7777584442634d504b4846326f3743756c3045365262442f474d47645636464e742f46654e7a45735a6b45502f4c50502f4b4f2f2f5762502f534c502f674c662f534b502f514b662f574b2f2f73762f2f554b502f494f662f5559502f594c502f6165502f474c502f4c4b662f7174502f504d762f4e4f662f5659762f664c502f634b662f5256662f4e4b502f484d2f2f584b662f4e4b762f6a4c5037754d502f6d71662f6668662f4f4b5071724a66656548502f4f53502f624c502f6164502f454b662f4a4b7679334a502f564b66362f5843663976436238756958377253442f344a482f3435372f797a6e2f79536a36706944356f78332f32696e2f3773662f3353332f3255442f3256542f38532f346d6865435846774e2f2f6779725734512b4a34662f3831412b716f652f2f43362f73636f656b63482b37496a546878634d502f424e7637414d2f2f4c502f6d6747502f3435502f32346637636d662f57592f7a4355502f724c762f6d4e662f5250366c7245656a474a5a39635841332f383969695a67372f384d2f367153482f3770565a4b67483570426e397543722f3837643554772f2f316d6a38354b656f6831442f35486e2f374d50306b426e316c527a2f786a4f4c59524b505551715463424851737946564a5147366e52756b594178694b4677772f7234742f3932452f2b4b522f2b69682f3777782b7138682b642b5a383971592f2b2f492f2b79752f746552395a55572f6339312f396b332b374d772f3946612f2b374d2f39644c2f394a442f39552b2f2b59733373493039635536344c4176386449346e6d455168316f526b475555625430442f394e41704877676d6e515a6330734a6d32345a383845356d334952763636502f373877626b6b55676b45476a5563477159635872323851734851522f2f536a2f2b75312f3773732f743264764b562f2f2f6d792f4c6f382f38394f2f2b7149695846422f2f6970673159595a445a634d4e2f4e6d7633485773363566374f4e52662f7476662f7971762f4d596c3876584444783270332f7831482f767a622f384c532f6f326561646a7a2f2b384436734677692f736f72337370634a2f50564b59413742624b57476c34685844434c5377697a6c7871595941326c59417947547767365775774d584442634d46777750585253546c4e634d4a304f6967736843414942425876424850326d4a6e626347616f654b557a69535a5a366d71424274725032626851353654594a52564c6d32665330705630712f4e43454d66466645346a317663695146493950765439634d46777742445a4a52454655654e71316b33565557326363686b6c43694f4179714c753765374c596f426b5a4a51306b5a4930746e6f3349416b6e5743416d467451786e75454e7775726f6264586433643565356e6e3366685a59793275327650656663632b2f3375383935333673652f7a766a783248476a686b7a466a4e752f4c395a4963534a453961627677615931302b59534178356a7a594e4d385663584c777066634f36744c523147394933465a756e594b61397977734e4d397654303759735762783443647932704b58627a574768335431695466485653336c352b57752b524669546e356433365770784466456647683554613739626e663952462f4b72373970724d6667754872465738366a3667634e78345a4d33584678774f42355550394c5545764676656145316d71654f563838724b6b72586674724232744b4b69756576484538314e61476435707977676d63506e315357335334367558723546776a4c56353873756c31572b65546873344b774f613839334778725364574c783632334b693866583758736334526c7134356672727a562b76684656596c314e71366a4f4753477933592f2b6557643069766e437864383138474377764e5853752b38544c3576633830497762634854724a657648626a337333726e77452b66674e635846322f65652f4774597657536532527730594a5433414b7138724c502b784765586c5649656545634e517770486d6f62346d624d7863532f553130394e786f654152325949454d4f6534533336463432447a51756c77695172795a772b456b4a695a757461576d6b73686b556d7171625374596775466d6363514b36304459546569745379475478474c78747032577737766134754e4a67506a34746c32484c5475336754474a6e4b4c72545677776f6c642f345677694d6b6768584363633265387379374b524547785a5a63373952784c416d4552654a4f7a7642555676494d4c42676231377370314873397246724b504f37443137443842634d434236513948545735675341556b34574a3962317a5976486d4665573131752f6345453545534b304e73546976304b6c7272647362477855627350376475784d6171446a54763248646f644652767264727558467653446f6c63666e536f53494a4e524d6a4f4e64456f37644a34784d354e63497050424d7970394831684e3643565353794e6c57685a4c45434f67687a4d67436b55346a5136574c4a5a5746696c566933724275386231384a564c5a53775773476730425a6472594d66467a54647746516f61545343493057713155726c76442b51642b67522b4c3457656745594c357871326d2b626e354c424e6355436c43574a6957437957636d57676a77634533564f6e5a4e4870534a37426c474e70536b34756176694a622b43477730696556716e7669555a4558467a6641584974384d495a426f4f704f626e31314f6e54502f2f61314d69486d5851364c306b2b6f43396f68677a7930306e7046415a4458434c4a61477a364c6666506c70615733464e464f64734e5846774767384a543676774776663743427739787953684d435a764b742f78316469486b37454a6e67346b746b5441705361346867324567416a7041704f49786a645334444d736635374b2f425753667132387755646c474a6b3874436b42332f6f552b4b4c325341684d624c63664f2f4e37632f4d755a5933552f5a6c77776a3637536f337a652b6c39782f6e35364a63686b382f6e38727844342f41796a684d465436663338515846634a77522f6c456965524148315644594331516976547935432b594f5830735845426f7a554b486e676c6f424c526251666c4a715241646975486d77504768343865715571695564684d4a6e67715353704e614f4468776542336d3534596b6567416b56326c317863725a6137374b4a41314169737038653751574e634a302b64486a787a3171795a77644f6e5473616950643450415232452f56777767413143457a7a2b437a774f682b382b2f52746a6d384d6575614f6d30317777584442634d4677775355564f524b35435949493d, 1985, 1),
(2, 'capek.png', 'image/png', 0x6956424f5277304b476770634d4677775844414e53556845556c7777584442634d4368634d4677775844416f43415a634d4677775844434d2f726874584442634d4677774358424957584e634d467777466956634d467777466955425356496b384677775844414d4f306c4551565259436157594358425631526e482f2b666374372b387243386b68437751396b316b31566146466a70464b30366874747052736334344c64615a756f30556264555a57334661526d6473486156613131776931673563497471697146584170523064424753525256456751416b4a325a4f33763350362f3237796b435146516a6e447962337633752b633733652b375a794c73745a696f45324e2f64553857445844376c6c36333044486e4b7563476969676d6e5a2f434946787578414d312b446f6e746c32357830627a6c5835514d5a37426c7769354d706b4b323977707031583479384e49665a753668342b4f77465964353061423432703048714352364d5379756137593678717a786763686a4537596243352b67573761384436656751485a4545315a6c6b456f366476762b75754334624f7251336773676433592b4c6d5a36396250667a6847736576662b514a71596d65674847304839426542546a73307249574a7332654244494a6e633345374935733071784b4f5667782f426c377146766f394838485a734649394d5a42467777646576586f49496145465336645534456a2b38756579367653486b2b42686c4e55444b646b4f48544a434f693849564365504665727a5854436442364261647148624e4f585472616c2b66784d4738355074617066317433675042477a5a746d5935323354365244506145453137636b4331497a6363644d765a6c54644e69574d5a42625930354c4264592f7578617242392b4b4b79795a426c31304342416342487072516d7534755770587537686d614d4e35634d4850734136532f574976306f573149487a64494e4e7239695a6935646468663744394f42586c6d77417565575678633876335a79353566574931436e30614b2b677438774f4c317a59682f2b416e2b6458384a6c4f6b45544970677036674969693758484f545173736241314c2b4c394b642f5275707748524c315147646a35703761465869514364747641693778314532647437774974534e75763352614645562b6a52597964475741396a537759457745572f31566547336a506944567a43416a5a4c6172757874657065642b797a75526964634279614f302b4466676e2f555141704d755162424749622f4339384342362f5579786461583576517857424265457031534d336a436f467777326768634a2b36564a6c597343586b77596e775a3776746e42484e634a783148304e6476376d37682f2f5533316b70724275413937316241363464795742435535383676466a49366c65706c79564d4371716d506a41314f6e6e48376d4e6f53704b7a6a776f6b44794f5a36736a476855463453787561796b566a2b526833756d46776e62383669695655644c37776a72344557363672747a486a76413775765457386a354f7335642f39504634757038304c7170764c7846623652305677774d6c6135727655357a414d614b6b4533313947447853456668677774787450626d43425a6366465a64496c6267746c4d433579616566435852684773394b49776f70652f386c3255436f4d7339315157644d6f4c37594c53515746456735724a7764686a33456c6a345556396e46626b665952754c596e3473557558384d566d392f335a2f6c475a646c687648707a4b4b6644474e79425134612b636c4567756f612f596b656b4853484339396e4a55332b2b4c44664854596745573353436c7049754c3077546b6273486e684f5961505a702f5a4b325a6a724e6c4f794776736a485976476f346851587778547351626b3476576e753565597773422f6f426370517a724552665079723575643764486b63716b30585765475254674c434935515255726f593358664555516f6d476377495555715544304a456f504630782b4b5065384c426d637a30314c4f30464b48362f4b497041586768587a532f3943472f752b67384f56786368374d396a6369683342354d4d6a6a476234347a446c6c674b645165624d4c2f6b6f334d47684535432b635051644a57333049753855504971736a7a634335414c305864666a46476841732b6f4756554e5750445a5933686e3839334954716e436b4d49672f46354e6179703030732f484f6c4c592f755678464f31656a30586632383746656a6d63646d5568377659354c2f4a625378364b3653554f784f36354a6e4a634a7a587263534e464d524e31766866436350664671564639415a326f54312f6f6954674d42772f756d50344f764e76395750335754314178756770465257477155476a7254484976506f375239573967365557725542466953764e66393035634973557942317769554178576431776e6b537656755a324c55644946766b65575959527342783837634167704443344c4a55357554744348385535414978447958434c4b79572b622b6a626d4e752f4747353950774a367557745a4544345a376a75436e465a39697a717939744b7043635a6a4b636b797548584a54796b4f6d76317863684e7630434c6b56684843736731417345514971657a68334871567053613968486463732f686a6631344c613737564446506463584558586c455a38764759787a745a6862464664546d7533327a67794850436a72464242752b37372b76557037386a69756c7863776b41386e4f5832424f6d355272303069756757426d48704230675052486a34354b71364631365372354558394b497a78744d484831765752523874346555356a33787579554745417a4b305468653770506a4a54617a464935706234547579694c566e3344452b7a67732f315865524e476d37513951314e5758355437717739416555644b554f525a4e625137386f676b67394c46644964466973574e75434c547669614738334c44305751627069574c555850377773482b4d6d42586953454d6765516c47557237427257774976723276482f726f3034676d366a394435424a77794d59694638776f516946435169334f484d516c46747a52466c723641696a74467032587473316d653455524f63786774646653517753322f625561694e59324b58434950796b4b63694955787964587632687a487a52746a7550566e455379344d675230644373517936355a48634d666e7578414f5347692b51364b41317863503139334e575878397a5774654774444678363974786944797a574d754969416c75644859524357766f433250616b616253624453564a6358456d504b526737372b394d776c756b634e58436646514f31516a7a614b647032555443346e693977622f667a2b444e54516b732b4148484d506264787473334e795578633035634d4e2b6336554755454145435371353074514f4844786973575a7667334a323475736f50533041366a4a5571445a764f514668364856685a702f4e57583646762b6661467a744a417252632b6c6870527872554268464e5243553765702b683669546c70666c367046417871537a6570566c5a7779566870464c65467a4570613239306a3435524e69392f5a354e516873574d6f784e4d31576978446876644d2b68546e534f78505938504832562f33745744363430617a63315a6358426d62744e72534630726d59444134346a59477565555372596367644b38533977757a356a764b79544f3338643574664b3361434e7a454734713477727861635350335470326c504f396c4d442b35334e6931626d4c7a517974686a4c44493946776e74387854573743766f39587574335364645330684d42776758565a4e355a6f48434f5651715851504e665938642f336a51764f3558467a6c76567863786556796f42565a50705035704b433446755a63584562384b6e4a4d45394670474e66434943793958444235534d77327039433639796a657a744a69566a5a65547151496f4678634b5035795954695a574d6e744169304b656e347a6f53426678664a68584366335843666b4b4a4e626944796a46397a54687a7575653336704e61497a7977717839786a6546705a656742776d725733354e724d75305a794e6d30354f51672f4a7747354173594a30446e4f5643527a666932756c435050634b6c44316455416a5034624168455978653036475975364a6734734639335677463349584c2b4d4654734b584f684d7432666a7972575964706476367869436649666261506e782b2b3336375a6d6f3065343154774a32437455346d6738534a493234535256776979735a487271554b674c64574b667a31425958573431524d38664a4b697873584755796251356c47507042447237775149496b2f755765534d446d5a4751546b5a70426d2b646c31774c3563496779556a736e3076567250743044446e52764e7972596a6d595a4d4d31334e394c6553596137314f4a6e4179723163584357446561422b59706e473437397a454d30366d446145525a676c786476713444654c4861786451526d787272744933756647756e464a4d454b61474a31465852335575586944655a485344634c534437434874765754656e793563724e354a486b6b677852584a6675636c543158724367754669754971376758762f4a634a343258486c63595031526832455367656e7033487a6b6547454851682b2f54324c534f5979683759707a4d77304f434f31776e3934525563786169612b555738346a6f4a67632f2f61697142366a585263687039694e4c33734f375936506d365a6d2b7a49336953722f6a77424a4d75575646494332533952597676325a7838774d616336396b66705249384c4e4c797967304856563436536b487a3735674d50316349674b4b4f33764b69303178446e34374a527349647a434444376162703056634a3063654551615a6f6c65686c6764634a7a64436c7648336d50552f316a2b664d6c6c6637522f47346a324970343049427759346e706e49616f6c30794947766942484f597575654b484c484b7247794a41722f2f79626577472b62464e38545772704e737375486e6343784b472f5a627634322b30577a6e4e4a37794859737833466151424663496d51314c794e65765649766e44565a332b4376397342587973446d5a712b6f58467a4a546c77695a556167714e76745843656646766a592f536d57347935694a526b6b58467859536c494e42736c4447627933315477336637565a51636c39684b766a39555162434b446b61795837734e392f43374f756d61455846565a35426e764c65664c6c3971664442425649426f7437394b4458756946354654676d765a51503939784b71356c4f31726c5757763159467130484d3064662f4d51387357516a3371504566766244424754416639334f43436969744b4a41446d61766e6c7863687071485a7576354530657179304e6c54746770317442754b574a73536d466d41726e5376485656385568693557444566646930636239744d596a565a377432374c4f7633376e65764c723147413553564b7832744338636e35302b426b556731776770446d524251546c37325865476f7671573658726d6843706358467863574b78726e596a5754706754736e546b446e46694f637534632f385071634f59316d627a316335442b5043506d387a37377878776f535457704b5133455537733361384e79494a634a343963496d6551767757306c4c325150587a74654e526358464b6c613065576f4c4977614b4d426e78595a4a46496d336870587837396f7775455044706d76566e376d576b732b723653454e4c494c574a7a585537617a42737a4e524644614339772f547579386b7139537469516370457554654a4975556368534c45554650416d696a574143657362326677506d5a69616f6e465634316e6537374d67434b616c63496b314f47774a634a34636f35693453424a4d4e62384474762f65544c2f566a5637727a584442634d4677775844424a52553545726b4a6767673d3d, 3209, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `komen` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `komen`, `id_user`, `id_movie`) VALUES
(1, 'Good movie', 2, 1),
(2, 'Thor ganteng', 1, 3),
(3, 'keren ngits', 4, 1),
(5, 'gils keren bezz', 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tahun` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `genre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `movie`
--

INSERT INTO `movie` (`id`, `judul`, `tahun`, `sinopsis`, `genre`) VALUES
(1, 'Avengers: Infinity War ', 2018, 'As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy, his goal is to collect all six Infinity Stones, artifacts of unimaginable power, and use them to inflict his twisted will on all of reality. Everything the Avengers have fought for has led up to this moment - the fate of Earth and existence itself has never been more uncertain. Written by Marvel Studios', 'Action, Adventure, Fantasy'),
(3, 'Thor: Ragnarok', 2017, 'Thor is imprisoned on the planet Sakaar, and must race against time to return to Asgard and stop RagnarÃ¶k, the destruction of his world, at the hands of the powerful and ruthless villain Hela.', 'Action, Adventure, Comedy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trailer`
--

CREATE TABLE `trailer` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trailer`
--

INSERT INTO `trailer` (`id`, `link`, `id_movie`) VALUES
(1, 'https://www.youtube.com/watch?v=6ZfuNTqbHE8', 1),
(2, 'https://www.youtube.com/watch?v=sAOzrChqmd0', 1),
(3, 'https://www.youtube.com/watch?v=3VbHg5fqBYw', 1),
(4, 'https://www.youtube.com/watch?v=pVxOVlm_lE8', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `subscribe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `status`, `subscribe`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(2, 'yunike', 'yunike@gmail.com', '1291ef032389ef8cbf122d150bc0ad16', 'user', 'true'),
(3, 'claudia', 'claudia@gmail.com', '2b9ff3efc4a999ecfacd18c4bbc57a2e', 'user', 'false'),
(4, 'amanda', 'amanda@gmail.com', '6209804952225ab3d14348307b5a4a27', 'user', 'true'),
(5, 'satria', 'satria@gmail.com', '477054c78baea7a1242f79d898a2ca46', 'user', 'false'),
(7, 'budi', 'budi@gmail.com', '00dfc53ee86af02e742515cdcf075ed3', 'user', 'false'),
(9, 'ani', 'ani@gmail.com', '29d1e2357d7c14db51e885053a58ec67', 'user', 'false'),
(10, 'bobo', 'bobo@gmail.com', 'ca2cd2bcc63c4d7c8725577442073dde', 'user', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artis`
--
ALTER TABLE `artis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_artis`
--
ALTER TABLE `detail_artis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artis`
--
ALTER TABLE `artis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_artis`
--
ALTER TABLE `detail_artis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
