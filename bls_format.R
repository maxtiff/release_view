library(XML)

jolts_url <- "http://www.bls.gov/news.release/jolts.htm\\"
mxp_url <- "http://www.bls.gov/news.release/ximpim.htm"

jolts_html <- htmlTreeParse(jolts_url,useInternalNodes = TRUE)
mxp_html <- htmlTreeParse(mxp_url, useInternalNodes = TRUE)

xpathSApply(jolts_html, "//title", xmlValue)
xpathSApply(jolts_html, "//td[@id='col-citedby']", xmlValue)

mxpDF <- read.table("mxp.txt",header=TRUE)
joltsDF <- read.table("jolts.txt", header=TRUE)
msioDF <- read.table("msio.txt", header = TRUE)

htmlCode <- readLines(mxp_url)
close(mxp_url)
htmlCode



  