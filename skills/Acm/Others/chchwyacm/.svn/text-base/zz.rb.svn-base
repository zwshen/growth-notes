
puts "this is replace program"

puts "Please enter file name:"
line = gets

puts "Open file:" + line

begin
	f = open(line.chop!) 

	text = f.read.gsub('&','&amp;').gsub!('<', '&lt;').gsub!('>', '&gt;')
	f.close

rescue SystemCallError
	puts "Open file Error!"
end

fout = open('tmp.txt','w')
fout.write	text
fout.close



