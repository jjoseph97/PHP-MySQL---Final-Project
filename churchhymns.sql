-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2017 at 08:20 PM
-- Server version: 5.5.56-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jjoseph12_2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `churchhymns`
--

CREATE TABLE `churchhymns` (
  `composer` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `year` int(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `label` varchar(100) NOT NULL,
  `description` longtext,
  `soundclip` varchar(40) DEFAULT NULL,
  `hymn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `churchhymns`
--

INSERT INTO `churchhymns` (`composer`, `title`, `year`, `type`, `filename`, `label`, `description`, `soundclip`, `hymn_id`) VALUES
('Dan Forrest', 'Angels From The Realms Of Glory', 2016, 'Christmas Hymns', 'Angels_From_the_Realms_of_Glory.jpg', 'Capital University Choral Series', 'This new arrangement of Angels From the Realms of Glory seeks to wrap the traditional tune in more vivid musical garb. As the piece unfolds, listen for the angels\' celestial music, a light appearing tot he shepherds, a sense of urgency for the journey of the wise men, and then, finally, a gathering of all these characters, along with \"all creation\", joining to praise the Trinity for the wonder of Christ\'s birth. - Dan Forrest', 'Angels From the Realms.mp3', 1),
('Kola Owolabi', 'Hodie Christus Natus Est', 2013, 'Christmas Hymns', 'Hodie_Christus_Natus_Est.jpg', 'Alfred Music Publishing', 'Perform this majestic double choir motet antiphonally, surrounding your audience or in traditional formation. As evidenced by the work\'s Renaissance character, this contemporary composer was influenced by his many years of singing 16th century music with a cathedral choir.', 'Hodie_Christus_Natus_Est.mp3', 2),
('Bob Chilcott', 'Mid-Winter', 1995, 'Christmas Hymns', 'mid-winter.jpg', 'Oxford University Press - Music Department', 'For SATB, with keyboard, or orchestra, or brass (2 tpt, hn, tbn, tuba) An easy and original setting of the well-known Rossetti text. An upper-voice version is also available. Accompaniments for orchestra and for brass, piano, and harp are available for hire. For full details see Instrumental carol accompaniments section.', 'Mid-Winter by Bob Chilcott Dec 2009.mp3', 3),
('Dan Forrest', 'Never a Brighter Star', 2005, 'Christmas Hymns', 'never-a-brighter-start.jpg', 'Beckenhorst Press Inc.', 'Editors Choice - Christmas services will be elevated with this beautiful, sensitive original.  It shares a deeply moving text by drawing the listener in with its poignancy.  Then it brings home a compelling message of the significance of the Christmas event.  Lovely indeed.', 'Never a Brighter Star.mp3', 5),
('Felix Mendelssohn', 'Hark! The Herald Angels Sing : A Concertato', 1847, 'Christmas Hymns', 'hark_the_herald_angels_sing.jpg', 'Alfred Archive Edition', 'Composed by Felix Bartholdy Mendelssohn (1809-1847). Arranged by Patrick M. Liebergen. Choral (Sacred); Choral Octavo; Masterworks; Worship Resources. Alfred Archive Edition. Christmas; Masterwork Arrangement; Romantic; Sacred; Winter. Choral Octavo. 12 pages. Published by Jubilate Music Group (AP.11424).\r\n\r\nItem Number: AP.11424\r\n\r\nPsalm 97; Titus 3:4-7; Luke 2:1-21; Isaiah 62:6-12.\r\n\r\nChristmas brass! The heraldic brass choir proclaims \"Glory to the newborn King.\" The splendid singers invoke the heavenly angel chorus. A majestic SATB Christmas hymn concertato, featuring optional brass quartet, unison youth choir, and congregational refrain.\r\n\r\nInst. Parts Available (choral); Recorded Acc. Available.', 'Boney M - The Herald Angels Sing.mp3', 6),
('Adolphe Adam', 'O Holy Night', 1981, 'Christmas Hymns', 'o-holy-night.jpg', 'Hinshaw Music Inc.', 'Composed by Adolphe-Charles Adam (1803-1856). Arranged by John Rutter. Advent and Christmas. John Rutter Series. Medium Adult. Choral, Christmas, Concert and Sacred. Octavo. 16 pages. Duration 5 minutes, 8 seconds. Published by Hinshaw Music Inc. (HI.HMC904).', 'Mariah Carey - O Holy Night.mp3', 7),
('John Rutter and William Henry Monk', 'All Things Bright and Beautiful', 1961, 'Wedding Hymns', 'all-things--bright-and-beautiful.jpg', 'Trinity Hymnal 120', 'All Things Bright and Beautiful is an Anglican hymn, also popular with other Christian denominations. The words are by Cecil Frances Alexander and were first published in her Hymns for Little Children.', 'All Things Bright and Beautiful.mp3', 8),
('Robert Kreutz', 'Gift of Finest Wheat', 1977, 'Funeral Hymns', 'giftoffinestwheat.jpg', 'Archdiocese of Philadelphia', 'This arrangement of the beloved communion hymn moves gracefully from 4/4 to 3/4 time, providing a good introduction to mixed meter. Ringers should be sure to emphasize the melody, particularly when it appears in the inner voices, and maintain a legato line throughout.', 'GiftofFinestWheat.mp3', 9),
('John Newton', 'Amazing Grace', 2010, 'Wedding Hymns', 'amazing-grace.jpg', 'Open Hymnal Project', '\"Amazing Grace\" is a Christian hymn published in 1779, with words written by the English poet and Anglican clergyman John Newton (1725Ã¢â‚¬â€œ1807). ... It debuted in print in 1779 in Newton and Cowper\'s Olney Hymns but settled into relative obscurity in England.', 'Celtic Woman - Amazing Grace.mp3', 11),
('Gregory Nobert', 'Ave Maria', 1994, 'Funeral Hymns', 'avemaria.jpg', 'OCP sheet music', 'Composed by Gregory Norbet. Sacred. Octavo. Published by OCP (OC.10001). Item Number: OC.10001', 'Ave Maria - Gregory Norbet.mp3', 12),
('Sir Joseph Barnby', 'O Perfect Love', 1889, 'Wedding Hymns', 'o perfect love.jpg', 'Hal Leonard Corporation', '\"O Perfect Love\" is a prayer that Christ\'s love and life may infuse a wedding couple\'s new life together. \r\nThe text, however, would be stronger if it contained a direct address to God or Christ in more customary \r\nbiblical terms. In 1897, several years after her sister\'s wedding, Dorothy Blomfield also married. She \r\nand her husband, Gerald Gurney, were both children of Anglican clergymen. Initially an actor, Gerald was \r\nlater ordained in the Church of England. But in 1919 Gerald and Dorothy joined the Roman Catholic \r\ncommunity at Farnborough Abbey. Dorothy Gurney wrote several volumes of verse, including A Little Book \r\nof Quiet, which contained the once well-known poem \"God\'s Garden.\"', 'O Perfect Love - Best Wedding Hymn.mp3', 13),
('Brad Paisley', 'The Old Rugged Cross', 2001, 'Funeral Hymns', 'the_old_rugged_cross.jpg', 'Sony/ATV Music Publishing LLC', '\"The Old Rugged Cross\" is a popular hymn written in 1912 by evangelist and song-leader George Bennard (1873Ã¢â‚¬â€œ1958).\r\n\r\nA Vision, a Melody and the Completion of the First Verse\r\nTroubled by their disregard for the gospel, Bennard turned to Scripture to reflect on the work of Christ on the cross. He later recalled, \"I seemed to have a vision ... . I saw the Christ and the cross inseparable.\" The melody came easily, and the first verse was completed by Bennard during a series of meetings in Albion, Michigan. Several months later, the remaining three verses were completed in Pokagon, Michigan, where Bennard was leading meetings at a local church.\r\n\r\nThe First Performance of the Hymn\r\nAfter completing the hymn, he performed the song in its entirety for the sponsoring pastor and his wife, Rev. Leroy and Ruby Bostwick, in the living room of the parsonage. The Bostwicks were moved to tears and incorporated the song in the revival service on June 7, 1913. First, Bennard sang his hymn with guitar accompaniment, and then a five-voice choir sang with organ and violin accompaniment. Today, that same church building, originally a hops barn, is owned by the non-profit Old Rugged Cross Foundation and welcomes thousands of visitors annually.\r\n\r\nThe hymn quickly spread throughout the region and came to the attention of the evangelist Billy Sunday, who frequently utilized it in his meetings. Two years later, Bennard sold the copyright to the song for a payment of $500, forgoing future royalties. Upon the renewal of the copyright 28 years later, he received a final payment of $5,000.', 'The Old Rugged Cross - Anne Murray.mp3', 21),
('John T. Burke', 'Give Me Joy In My Heart', 2014, 'Wedding Hymns', '793.jpg', 'Hymns Ancient & Modern Ltd,', 'The rousing words and lyrics of the beloved hymn begin with \"Give me joy in my heart, keep me praising, Give me joy in my heart, I pray\" as the first line of the hymn. The author of the lyrics and name of the composer of the music that accompanies the \"Give Me Joy in my Heart\" hymn have been lost over time and are therefore unknown, but continue to be enjoyed by members of the Church. The classical lyrics  of the hymn provide a Christian message of praise, joy and peace. We have placed \"Give Me Joy in my Heart\" in the category of Wedding Songs. Enjoy the edifying lyrics of this popular Christian song and classic church hymn.\r\n\r\nChildren will enjoy singing this energetic, original melody from the pen of John Burke. The lively, rhythmic keyboard accompaniment supports the voices nicely. After the melody has been well established, an optional descant is added.', 'Give Me Joy in My Heart.mp3', 22),
('Paul Inwood and Eugenio Costa, S.J.', 'Misericordes Sicut Pater', 2015, 'Sunday Hymns', 'misercordes.jpg', 'Pontifical Council for the Promotion of New Evangelization', 'The title is drawn from John 6:36, Misericordes sicut Pater (English: Be Merciful, As Your Father Is), by English composer Paul Inwood. Inwood\'s composition was the winner in an international competition sponsored by the Pontifical Council for the Promotion of the New Evangelization. The hymn has now been released in Italian, French, and English, with a Latin antiphon and refrains.', '', 26),
('David Haas and Michael Joncas', 'Blest Are They', 1996, 'Sunday Hymns', 'blestarethey.jpg', 'GIA PUBLICATIONS, INC.', 'Inspired by the witness and example of his good friend Barbara Colliander and her work with the poor, David Haas virtually blazed through the composing of this GIA best-seller. David believes that the success of this song is due largely in part to the fact that it \"came from a place of tremendous and total gratitude for the \'ambassadors of God\' at the Dorothy Day Center [in St. Paul, MN] and for the witness and example of [his] good friend, Barbara.\" In November of 2014 \"Blest Are They\" celebrates its 30th anniversary.', 'Blest Are They - David Haas (Cover).mp3', 27),
('Jaime Cortez', 'Rain Down', 1995, 'Easter Hymns', 'raindown.jpg', 'Hope Publishing Company', 'This memorable prayer chorus is widely known in the Catholic church and John Carter\'s top-selling gospel realization has brought this riveting song to choirs and congregations across the country. New for 2008 is an SATB setting with optional congregation and a new rhythm track. The Rhythm packets contains parts for: Piano, Electric Guitar, Electric Bass, Hammond B3 Organ, and Drum Kit.', 'Rain Down (Jaime Cortez).mp3', 28),
('Bernadette Farrell', 'Bread for the World', 1990, 'Sunday Hymns', 'no_thumb.jpg', 'OCP Publications', 'Composed by Bernadette Farrell. Sacred. Octavo. Published by OCP (OC.11727).\r\n\r\nItem Number: OC.11727', '', 29),
('Marty Haugen', 'Sing Out, Earth and Skies!', 2009, 'Sunday Hymns', 'singout.jpg', 'GIA PUBLICATIONS, INC.', 'Come, O God, of all the earth.... Composed by Marty Haugen. Advent. Celebration Series. Sacred. Octavo. With guitar chord names. 4 pages. Published by GIA Publications (GI.G-3590).\r\n\r\nItem Number: GI.G-3590', 'Sing Out Earth and Skies! (Marty Haugen)', 30),
('Bernadette Farrell', 'Your Words are Spirit and Life', 1994, 'Sunday Hymns', 'yourwords.jpg', '2017 Musicnotes, Inc.', '\r\nProverbs 25:11\r\n\r\nJesus says in John 6:63 that His \"words are spirit, and they are life.\" These proverbs add that anybody\'s words are what the Bible calls \"spirit.\" There is nothing material, nothing visible, happening, but words and attitudes nevertheless generate emotional, attitudinal, and behavioral reactions. They can induce and compel powerful reactions, such as murder, on the bad side, or joy unspeakable, where we just do not have the words to communicate that we are so happy, on the good. Yet, nothing really happens except spirit passing from one person to anotherâ€”nothing, that is, that we would call physical, material. Nothing touches us but the meaning of a word, a disposition, or an attitude that is communicated.', 'Your Words are Spirit and Life.mp3', 31),
('Bernadette Farrell', 'Christ Be Our Light', 1994, 'Easter Hymns', 'christbeourlight.jpg', 'OCP - Choral Series', '', 'Christ be our light.m4v.mp3', 32),
('Dan Schutte', 'Join In The Dance', 2001, 'Easter Hymns', 'joininthedance.jpg', 'OCP - Choral Series', '', 'Join In The Dance.mp3', 33),
('Michael Joncas', 'Take and Eat', 2017, 'Easter Hymns', 'takeandeatjpg.jpg', 'GIA PUBLICATIONS, INC.', 'Michael Joncas is a liturgical composer, author, speaker, and professor who is perhaps best known for his song \"On Eagle\'s Wings.\" He graduated magna cum laude with a bachelor\'s degree in English from the University of St. Thomas and graduated summa cum laude from the University of Notre Dame with a master\'s degree in theology and liturgical studies. Michael also graduated summa cum laude with degrees in liturgical studies from Pontificio Istituto Liturgico of the Ateneo Sant\'Anselmo. From 1980 to 1984, he was an associate pastor with Presentation of the Blessed Virgin Mary Parish in Maplewood, Minnesota.', '', 34),
('Marty Haugen', 'Springs of Water, Bless the Lord', 2012, 'Easter Hymns', 'springsofwater.jpg', 'GIA PUBLICATIONS, INC.', 'SATB (or unison), cantor, keyboard accompaniment\r\nE-flat version. Composed by Marty Haugen. Celebration Series. Sacred. Octavo. With guitar chord names. 4 pages. Published by GIA Publications (GI.G-4135).\r\n\r\nItem Number: GI.G-4135\r\n\r\nText by Marty Haugen.', '', 35),
('Michael W. Smith', 'Crown Him with Many Crowns', 1995, 'Easter Hymns', 'crown.jpg', 'Center for Church Music', 'This hymn was written by Catholic convert MatÂ­thew BridgÂ­es, first published in 1852.  A competing version was written by Anglican clergyman Godfrey Thring (originally six verses) was published in 1874.  \r\n\r\nBased on common use today, verses 1, 4, 5, 6 & 9 below are from Bridges version, and verses 2 and 3 from the Thring version.\r\n\r\nWith meter Meter: 6.6.8.6 D, the most common tune for the hymn is George J Elvery\'s DIADEMATA (1868), but it has also been set to OLIVA SPECIOSA, an Italian tune from the 18th century.', '', 36),
('Anne Quigley', 'There is a Longing', 2008, 'Confirmation Hymns', 'thereisalonging.jpg', 'OCP Publications', 'Anne Quigley is a respected composer and liturgist whose music has been featured in the Decani Choral Music Series in England. She manages to balance her work in music composition and liturgy with her work as a full-time homemaker. Anne is a member of the St. Thomas More Group of composers.', '', 37),
('David Haas', 'You Are Always Present', 2009, 'Confirmation Hymns', 'youarealwayspresent.jpg', 'GIA Publications, Inc.', 'SATB choir, cantor, voice solo, assembly, keyboard accompaniment, C instrument cello 2 or 3 octave handbells, 2 or 3 octave handchimes - Easy\r\nComposed by David Haas. Celebration Series. Sacred. Octavo. With guitar chord names. 4 pages. Published by GIA Publications (GI.G-7723).\r\n\r\nItem Number: GI.G-7723\r\n\r\nLanguage: English. Text by David Haas.\r\n\r\nFor cantor or soloist\r\n\r\n2 or 3 octaves Handbells or Handchimes', '', 38),
('David Haas', 'Send Us Your Spirit', 2001, 'Confirmation Hymns', 'sendusyourspirit.jpg', 'GIA Publications, Inc.', '', 'Send Us Your Spirit By David Haas.mp3', 39),
('Bob Dufford, S.J.', 'Be Not Afraid', 1997, 'Confirmation Hymns', 'benotafraid.jpg', 'OCP Publications', 'SAB SATB choir (SATB choir)\r\nComposed by Bob Dufford. Arranged by Douglas E. Wagner. Funeral, Hope, Sacred, General Worship. Octavo. Published by Hope Publishing Company (HP.A683).\r\n\r\nItem Number: HP.A683\r\n\r\nDeuteronomy 31:7-8, Exodus 15:22-27, Exodus 17:1-7, Mark 4:35-41, Isaiah 41:17-20, Isaiah 43:1-7, Isaiah 55:1-2, John 12:26, John 21:19, Joshua 1:5-7, Luke 9:23, Matthew 11:28, Matthew 28:20, Matthew 4:19, Matthew 5:3-10, Matthew 8:2.', '', 40),
('Tom Kendzia', 'The Eyes And Hands Of Christ', 2008, 'Confirmation Hymns', 'no_thumb.jpg', 'OCP Publications', 'This is a lovely song about the real presence by Tom Kendzia that even appears to be singable by an assembly. It has an instrumental interlude after two verses leading to a key change and a third verse and final chorus. The text is at spiritandsong where the sheet music can be purchased for download.', '', 41),
('Michael Saward', 'Baptized In Water', 2012, 'Baptism Hymns', 'baptizedinwater.jpg', 'Hope Publishing Company', 'Michael Saward (PHH 16) wrote \"Baptized in Water\" in London on May 29,1981, a few days after the twenty-fifth anniversary of his ordination to the ministry. The text was first published in Hymns for Today s Church (1982), a hymnal on which Saward worked as text editor.\r\n\r\nThis song explains the New Testament theology on baptism in a rather compact way. The first line in each stanza alludes to John 3:5, Ephesians 1:13, and 1 Peter 3:21. The rest of each stanza explains the process symbolized by baptism: being cleansed by Christ\'s blood for salvation and godly living (st. 1); dying and being buried with Christ and rising again, free and forgiven (st. 2); and gaining the privilege of becoming God\'s children through Christ (st. 3). Each stanza also finishes with a note of praise to God. The text is powerful precisely because it is biblical.\r\n\r\nLiturgical Use:\r\nInfant or adult baptism. An excellent example of a \"triumphant hymn\" called for in the second form for Baptism of Children and the second form for Baptism of Adults in the Psalter Hymnal.', '', 42),
('Jane Parker Huber', 'Wonder of Wonders, Here Revealed', 1980, 'Baptism Hymns', 'no_thumb.jpg', 'Digital Songs & Hymns', '', '', 43),
('Edith Margaret Clarkson', 'For Your Gift of God the Spirit', 1976, 'Baptism Hymns', 'foryourgiftofgod.jpg', 'Omega OPC', 'Margaret Clarkson (PHH 238) wrote this text about the work of the Holy Spirit during the summer of 1959 at the Severn River, Ontario, Canada. Requested by Stacey Woods, General Secretary of Inter-Varsity Christian Fellowship in Canada and the United States, the text was first published in Anywhere Songs (IVCF songbook, 1960). Clarkson revised the text for use in IVCF\'s Hymns II in 1976 and made final revisions in 1984.\r\n\r\nIf \"Veni, Creator Spiritus\" (425 and 426) is the classic prayer text to the Holy Spirit, \"For Your Gift\" is the best teaching text on the Holy Spirit. Inspired by biblical passages about the work of the Spirit in creation, the church, and our personal lives, this text reads like a study of the doctrine of the Holy Spirit. It is a splendid example of sung theology, which brings our heart\'s confession onto our lips.', '', 44),
('Dan Schutte', 'When We Eat This Bread', 2013, 'Communion Hymns', 'no_thumb.jpg', 'OCP Publications', '', '', 45),
('Keith Getty, Kristyn Lennox Getty, Stuart Townend', 'Behold The Lamb', 2008, 'Communion Hymns', 'beholdthelamb.jpg', 'Genius Media Group Inc.', 'â€œThe Communion Hymn is exactly what it says it is -a hymn to be used during the communion part of a service... \r\n\r\nThe opening verse sets the context, preparing us for communion with verse 2 focussing on the bread and verse 3 the wine while verse 4 being the response as we leave. \r\n\r\nWe use this hymn in many different contexts depending on how a church serves communion. Some churches do the first two verses before the bread as a preparation then the last two after the wine as a response.  Sometimes churches do each of the four verses one at a time, then have musicians play around the melody in between each one until the leader is ready to move to the next verse. It can also be sung as a whole piece straight through. While it has become a moving and well loved song, the winding melody does take a few playings for the congregation to get used to it.â€', '', 46),
('Chris Tomlin & Matt Redman', 'The Wondrous Cross', 2001, 'Communion Hymns', 'whenisurvey.jpg', 'GIA PUBLICATIONS, INC.', 'A thoughtful and worship-filled setting of the familiar hymn, \"When I survey the wondrous cross on which the Prince of Glory died, my richest gain I count but loss, and pour contempt on all my pride.\"', '', 47),
('Matt Redman', 'No One Like Our God', 2015, 'Communion Hymns', 'noonelikeourgod.jpg', 'Patheos', '', '', 49);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `churchhymns`
--
ALTER TABLE `churchhymns`
  ADD PRIMARY KEY (`hymn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `churchhymns`
--
ALTER TABLE `churchhymns`
  MODIFY `hymn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;