for (i in 1:8) {
table <- paste("Table", as.character(i), sep=" ")
worksheets <- list()
assign(paste("Table",i,sep=""), worksheets[[i]])
get(worksheets[[i]]) <- read.xls("msio_full.xls", table)
}

