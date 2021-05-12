# Reflections on Three Years of Reading Knuth

reference: https://commandlinefanatic.com/cgi-bin/showarticle.cgi?article=art070

A little over three years ago, I picked up a boxed set of the first three volumes of Donald Knuth's "The Art of Computer Programming" (TAOCP). I knew them by reputation before I ever even considered reading them — I knew, for example, that they had a reputation for being packed with dense mathematicalese along with a lot of brain-bendingly difficult problems. For whatever reason, that's the sort of odd challenge that appeals to me, so I went into the series with the intent to work every single problem. That turned out to be unrealistically ambitious - for one thing, there are a few problems that are marked as "research problems" that Knuth himself admits should take a motivated graduate student a semester to complete satisfactorily. There are even a few problems that he lists as "unsolved research problems" that may not even have a solution. I ended up settling for making at least a realistic attempt at every problem; even so, I was able to work far fewer than I expected I should have been able to. This is some seriously advanced material. I finally finished volume 3 last month, after three years of working as many problems as I was smart enough to work (which turned out to be fewer than I'd care to admit - but don't judge me until you try it yourself!)

> 大約三年前，我從唐納德·克努斯（Donald Knuth）的“計算機編程藝術”（TAOCP）的前三冊中選取了盒裝。在我甚至沒有考慮閱讀它們之前，我就已經通過聲譽來了解它們-例如，我知道它們以其密集的數學知識以及許多大腦難以解決的難題而聞名。無論出於何種原因，這都是吸引我的奇怪挑戰，因此我以解決每個問題的目的進入了本系列。事實證明，這是不切實際的雄心勃勃的-一方面，有一些被標記為“研究問題”的問題，Knuth本人承認應該讓一個有動力的研究生每學期完成一個令人滿意的課程。他甚至列舉了一些甚至沒有解決方案的“未解決的研究問題”。我最終決定至少對每個問題都進行實際的嘗試。即便如此，我的工作量卻遠遠少於我的預期。這是一些非常先進的材料。經過三年的工作之後，我終於上個月完成了第3卷，因為我已經足夠聰明地工作了（這比我不願承認的要少-但是在您自己嘗試之前，不要對我進行評判！ ）

I know that a lot of programmer types talk about these books — more than once I've seen them referred to as the books that everybody recommends but nobody actually reads. A lot of people are put off by the academic packaging or the cost; I can't disagree with either of those concerns. The books are heavily academic — to the point that they can and have been used as college textbooks. They're also expensive but, I think, worth the cost.

> 我知道許多程序員類型都在談論這些書–不止一次，我已經看到它們被稱為每個人都推薦的書，但實際上沒有人讀。很多人因學術包裝或成本而推遲；我不能不同意這些擔憂。這些書具有很高的學術性，以至於它們可以並且已經被用作大學教科書。它們也很昂貴，但我認為值得。


Another reason people sometimes suggest staying away from TAOCP is that the material is irrelevant in the 21st century. This is sort of a more difficult concern to counter, honestly, especially now that I've finished all three books. On the one hand, I know that the Sun developers who put together the Java programming language leaned heavily on Knuth's discussion of random number generation and large-number mathematical operations in volume 2. On the other hand, though, most of us won't be undertaking any projects like the Java programming language in our careers. It's neat to read and entertaining to know, but you can probably get along your whole life just using the PRNG and mathematical libraries built into your programming environment without ever really understanding what makes them tick.

> 人們有時建議遠離TAOCP的另一個原因是，該材料在21世紀是無關緊要的。老實說，這是一個更難解決的問題，尤其是在我完成了所有三本書之後。一方面，我知道將Java編程語言組合在一起的Sun開發人員在很大程度上依賴於Knuth對第2卷中的隨機數生成和大量數學運算的討論。另一方面，儘管如此，我們大多數人都不會在我們的職業生涯中從事任何項目，例如Java編程語言。閱讀和娛樂都很整潔，但是您可能只使用編程環境中內置的PRNG和數學庫就可以度過自己的一生，而無需真正了解使它們產生變化的原因。


Volume 3 actually contains both the most relevant along with the least relevant material. The most relevant includes Knuth's discussion of sorting and searching routines. Of course, if you've studied computer science at any level, you already have a decent handle on sorting algorithms; you probably know that Quicksort is O(n log n) and Bubblesort is O(n2) and even if you can't quite remember what that terminology means, you know that Quicksort is better than bubble sort. I remember studying sorting algorithms as an undergraduate from Sedgewick; Sedgewick presented the worst-case behavior of each of the sorting algorithms and sort of punted on the "average" case by presenting them but explaining that their derivation was "beyond the scope of the book". As far as I know, besides papers published in inaccessible academic journals, the derivation of the average case of most sorting routines is beyond the scope of every book except for TAOCP where he patiently builds the concepts up from scratch. He does the same with many standard CS concepts like AVL trees and hash codes as well.

> 第3卷實際上包含了最相關和最不相關的材料。最相關的包括Knuth對排序和搜索例程的討論。當然，如果您已經學習了計算機科學的各個級別，那麼您已經對排序算法有了很好的了解。您可能知道Quicksort為O（n log n），Bubblesort為O（n2），即使您不太記得該術語的含義，您也知道Quicksort比冒泡排序更好。我記得在Sedgewick讀本科時曾學習過排序算法。 Sedgewick通過介紹它們，展示了每種排序算法的最壞情況行為，並對“平均”情況進行了分類，但解釋說它們的推導“超出了本書的範圍”。據我所知，除了無法訪問的學術期刊上發表的論文外，大多數排序例程的平均情況的推導超出了每本書的範圍，除了TAOCP耐心地從頭開始建立概念。他對許多標準CS概念（例如AVL樹和哈希碼）也是如此。

However, the least relevant material to a modern programmer appears in the middle of volume 3, spanning about 100 pages: a detailed description on how to most efficiently use external tape drives to sort data that's too large to fit into main memory. As with most things Knuth, the presentation is fascinating and the theory is amazing. In short, the idea is to sort as much data as you can onto as many tapes as you have, and then merge the data from the tapes onto a final sorted tape. He considers the time needed to rewind the tapes as well as taking advantage of tape drives that can read and write both forward and backward, even accounting for things like rotational speed and the time it takes a tape to get rotating at full speed. As amazing as it is that anybody was ever able to work this out to such efficiency, I can't imagine how any of these algorithms could be applied outside of their original use case and if you really actually need to sort more data than you can fit into RAM, there are almost definitely better solutions than a bank of external tape drives. As carefully as I read all the other sections, I did find myself skimming through the more difficult exercises in this section.

> 但是，與現代程序員最不相關的材料出現在第3卷的中部，佔地約100頁：有關如何最有效地使用外部磁帶驅動器對太大的數據進行分類以適合主存儲器的詳細說明。與Knuth的大多數事情一樣，演示文稿也很有趣，而且理論也很棒。簡而言之，該想法是將盡可能多的數據排序到盡可能多的磁帶上，然後將這些磁帶中的數據合併到最終排序的磁帶上。他考慮了倒帶的時間以及利用可以前後讀寫的磁帶驅動器所需要的時間，甚至考慮了諸如旋轉速度和磁帶全速旋轉所花費的時間之類的問題。令人驚訝的是，任何人都能夠以如此高的效率解決這個問題，我無法想像這些算法中的任何一種如何在其原始用例之外應用，以及您是否真的需要整理比您更多的數據裝入RAM後，幾乎肯定有比一組外部磁帶驅動器更好的解決方案。在閱讀其他所有章節時，我確實很認真地瀏覽了本節中比較困難的練習。


Still, even setting aside the irrelevance of the middle section, it's as questionable how useful the rest of the content is to a modern software developer. It's almost as unlikely that any of us will be implementing our own sorting or searching routines as it is that we'll be developing the sorts of random number generators or unlimited precision math libraries that were the focus of volume 2. As interesting as the material is, these books are a huge time commitment, and if you don't have a lot of time to spare, you can probably spend it more "efficiently" on the study of machine learning algorithms or something else "enterprisey". If you do have the time, though, whether you actually apply the lessons from these books or not, it's fascinating to work through.

> 儘管如此，即使撇開中間部分的不相關性，其餘的內容對現代軟件開發人員的有用性也令人質疑。我們所有人都幾乎不可能實現我們自己的排序或搜索例程，因為我們將開發作為第2卷關注的隨機數生成器或無限精度數學庫。就是說，這些書花費了大量的時間，如果您沒有太多時間可以節省，您可能可以更“有效地”花費在學習機器學習算法或其他“企業”上。但是，如果您有時間，無論您是否實際應用這些書中的課程，都將很有趣。

The last concern I hear (or read, anyway) from people is that the books not only use assembler for code examples, but use an imaginary assembler language that Knuth made up just for these books. Well, if you're on the fence about taking the plunge and diving into TAOCP and you're concerned about the cost, content, or relevance of these books, I can't say that I can reasonably set your mind at ease on any of these counts. However, if you're put off by the use of assembler, I can assure you that it's actually a relatively small part of the books. Further, all of the algorithms are presented first in what Knuth calls "pseudocode" but is nearly a compilable language. In fact, it's close enough to Python that translating it almost verbatim is practically a mechanical process.

> 我聽到（或無論如何從人們那裡讀到的）最後一個擔心是，這些書不僅使用彙編語言編寫代碼示例，而且使用了Knuth專門為這些書籍編寫的虛構的彙編語言。好吧，如果您不願冒險嘗試TAOCP，而又擔心這些書的成本，內容或相關性，那麼我不能說我可以合理地讓您放心這些計數。但是，如果您因使用彙編程序而感到不滿意，那麼我可以向您保證，它實際上只是書中的一小部分。此外，首先以Knuth所謂的“偽代碼”介紹所有算法，但幾乎是一種可編譯的語言。實際上，它與Python非常接近，幾乎逐字翻譯它實際上是一個機械過程。


Consider listing 1, below. This is Knuth's description of one of the more complex algorithms from volume 3, the AVL tree algorithm which keeps a binary tree balanced dynamically as new nodes are added to it. As you can see, Knuth has variables, structures, and looping constructs (although he doesn't seem to have had a chance to confer with Djikstra with regards to the use of GOTOs).

> 考慮下面的清單1。這是Knuth對第3卷中較複雜的算法之一的描述，AVL樹算法在添加新節點時使二叉樹保持動態平衡。如您所見，Knuth具有變量，結構和循環構造（儘管他似乎沒有機會與Djikstra商討GOTO的使用）。

* Listing 1: AVL tree as described in volume 3 of "The Art of Computer Programming"


    The nodes of the tree are assumed to contain KEY, LLINK, and RLINK fields as in
    Algorithm 6.2.2T. We also have a new field`

    B(P) = balance factor of NODE(P)

    the height of the right subtree minus the height of the left subtree; this field
    always contains either +1, 0, or -1. A special header node also appears at the top
    of the tree, in location HEAD; the value of RLINK(HEAD) is a pointer to the root
    of the tree, and LLINK(HEAD) is used to keep track of the overall height of the tree.
    (Knowledge of the height is not really necessary for this algorithm, but it is useful
    in the concatenation procedure discussed below.) We assume that the tree is nonempty,
    namely that RLINK(HEAD) != ^.

    For convenience in description, the algorithm uses the notation LINK(a,P) as a synonym
    for LLINK(P) if a = -1, and for RLINK(P) if a = +1.

    A1. [Initialize.] Set T <- HEAD, S <- P <- RLINK(HEAD). (The pointer variable P will
    move down the tree; S will point to the place where rebalancing may be necessary, and
    T always points to the parent of S.)

    A2. [Compare.] If K < KEY(P), go to A3; if K > KEY(P), go to A4; and if K = KEY(P), the
    search terminates successfully.

    A3. [Move left.] Set Q <- LLINK(P). If Q = ^, set Q <= AVAIL and LLINK(P) <- Q and go
    to step A5. Otherwise if B(Q) != 0, set T <- P and S <- Q. Finally set P <- Q and return
    to step A2.

    A4. [Move right.] Set Q <- RLINK(P). If Q = ^, set Q <= AVAIL and RLINK(P) <- Q and go
    to step A5. Otherwise if B(Q) != 0, set T <- P and S <- Q. Finally set P <- Q and return
    to step A2. (The last part of this step may be combined with the last part of step A3.)

    A5. [Insert.] (We have just linked a new node, NODE(Q), into the tree, and its fields
    need to be initialized.) Set KEY(Q) <- K, LLINK(Q) <- RLINK(Q) <- Λ, and B(Q) <- 0.

    A6. [Adjust balance factors.] (Now the balance factors on nodes between S and Q need to
    be changed from zero to +/-1.) If K < KEY(S) set a <- -1, otherwise set a <- +1. Then set
    R <- P <- LINK(a,S), and repeatedly do the following operations zero or more times until
    P = Q: If K < KEY(P) set B(P) <- -1 and P <- LLINK(P); if K > KEY(P), set B(P) <- +1 and
    P <- RLINK(P). (If K = KEY(P), then P = Q and we proceed to the next step.)

    A7. [Balancing act.] Several cases now arise:

    i) If B(S) = 0 (the tree has grown higher), set B(S) <- a, LLINK(HEAD) <- LLINK(HEAD) + 1,
        and terminate the algorithm.

    ii) If B(S) = −a (the tree has gotten more balanced), set B(S) <- 0 and terminate the algorithm.

    iii) If B(S) = a (the tree has gotten out of balance), go to step A8 if B(R) = a, to A9 if
        B(R) = −a. (Case (iii) corresponds to the situations depicted in (1) when a = +1; S and
        R point, respectively, to nodes A and B, and LINK(−a,S) points to A, etc.)

    A8. [Single rotation.] Set P <- R, LINK(a,S) <- LINK(−a,R), LINK(−a,R) <- S,B(S) <- B(R) <- 0.
        Go to A10.

    A9. [Double rotation.] Set P <- LINK(−a,R), LINK(−a,R) <- LINK(a,P),LINK(a,P) <- R, LINK(a,S)
        <- LINK(−a,P), LINK(−a,P) ← S. Now set

                { (-a,0), if B(P) =  a;
    (B(S),B(R))<-{ ( 0,0), if B(P) =  0;
                { ( 0,a), if B(P) = -a;

    and then set B(P) <- 0

    A10. [Finishing touch.] (We have completed the rebalancing transformation, taking (1) to (2),
    with P pointing to the new subtree root and T pointing to the parent of the old subtree root S.)
    If S = RLINK(T) then set RLINK(T) <- P, otherwise set LLINK(T) <- P.


* Listing 2: AVL implemented in Python, Knuth-style

Converting this description into working Python code doesn't even require a deep understanding of the underlying algorithm. Knuth uses ^ to represent "NIL" (Python's NONE), <- to indicate assignment and the unusual syntax B(P) to represent the B field of P which most languages indicate with P.B. I've removed some of the exposition but kept the essentials of the description in comments in the Python translation in listing 2, below. All of the comments are Knuth's words, not mine.

    # The nodes of the tree are assumed to contain KEY, LLINK, and RLINK fields.
    # We also have a new field
    #
    # B(P) = balance factor of NODE(P)
    #
    # the height of the right subtree minus the height of the left subtree; this field
    # always contains either +1, 0, or -1.  A special header node also appears at the top
    # of the tree, in location HEAD; the value of RLINK(HEAD) is a pointer to the root
    # of the tree, and LLINK(HEAD) is used to keep track of the overall height of the tree.
    # We assume that the tree is nonempty, namely that RLINK(HEAD) != ^.

    class node:
    def __init__(self):
        self.KEY = None
        self.LLINK = None
        self.RLINK = None
        self.B = 0

    HEAD = node()
    HEAD.RLINK = node()
    HEAD.RLINK.KEY = 'A'

    # For convenience in description, the algorithm uses the notation LINK(a,P) as a synonym
    # for LLINK(P) if a = -1, and for RLINK(P) if a = +1.

    def LINK(a, P):
    if a == -1:
        return P.LLINK
    else:
        return P.RLINK

    def setLINK(a, P, val):
    if a == -1:
        P.LLINK = val
    else:
        P.RLINK = val

    def avl(K):
    # A1. [Initialize.] Set T <- HEAD, S <- P <- RLINK(HEAD).
    T = HEAD
    S = P = HEAD.RLINK
    # A2. [Compare.] If K < KEY(P), go to A3; if K > KEY(P), go to A4; and if K = KEY(P), the
    #     search terminates successfully.
    while True:
        if K == P.KEY:
        return P
        elif K < P.KEY:
    # A3. [Move left.] Set Q <- LLINK(P). If Q = ^, set Q <= AVAIL and LLINK(P) <- Q and go
    #     to step A5. Otherwise if B(Q) != 0, set T <- P and S <- Q. Finally set P <- Q and return
    #     to step A2.
        Q = P.LLINK
        if Q is None:
            Q = node()
            P.LLINK = Q
            break
        else:
            if Q.B != 0:
            T = P
            S = Q
            P = Q
    # A4. [Move right.] Set Q <- RLINK(P). If Q = ^, set Q <= AVAIL and RLINK(P) <- Q and go
    #     to step A5. Otherwise if B(Q) != 0, set T <- P and S <- Q. Finally set P <- Q and return
    #     to step A2.
        elif K > P.KEY:
        Q = P.RLINK
        if Q is None:
            Q = node()
            P.RLINK = Q
            break
        else:
            if Q.B != 0:
            T = P
            S = Q
            P = Q
    # A5. [Insert.] Set KEY(Q) <- K, LLINK(Q) <- RLINK(Q) <- ^, and B(Q) <- 0.
    Q.KEY = K
    Q.LLINK = Q.RLINK = None
    Q.B = 0
    # A6. [Adjust balance factors.] If K < KEY(S) set a <- -1, otherwise set a <- +1. Then set
    #     R <- P <- LINK(a,S), and repeatedly do the following operations zero or more times until
    #     P = Q: If K < KEY(P) set B(P) <- -1 and P <- LLINK(P); if K > KEY(P), set B(P) <- +1 and
    #     P <- RLINK(P).
    if K < S.KEY:
        a = -1
    else:
        a = 1
    R = P = LINK(a,S)
    while P != Q:
        if K < P.KEY:
        P.B = -1
        P = P.LLINK
        elif K > P.KEY:
        P.B = 1
        P = P.RLINK

    # A7. [Balancing act.] Several cases now arise:
    #
    #  i) If B(S) = 0, set B(S) <- a, LLINK(HEAD) <- LLINK(HEAD) + 1,
    #     and terminate the algorithm.
    #
    if S.B == 0:
        S.B= a
        #HEAD.LLINK = HEAD.LLINK + 1
        return Q

    # ii) If B(S) = -a, set B(S) <- 0 and terminate the algorithm.

    elif S.B == -a:
        S.B = 0
        return Q
    #
    # iii) If B(S) = a, go to step A8 if B(R) = a, to A9 if B(R) = -a.
    elif S.B == a:
        if R.B == a:
    # A8. [Single rotation.] Set P <- R, LINK(a,S) <- LINK(-a,R), LINK(-a,R) <- S,B(S) <- B(R) <- 0.
    #     Go to A10.
        P = R
        setLINK(a, S, LINK(-a, R))
        setLINK(-a, R, S)
        S.B = R.B =0
        elif R.B == -a:
    # A9. [Double rotation.] Set P <- LINK(-a,R), LINK(-a,R) <- LINK(a,P),LINK(a,P) <- R, LINK(a,S)
    #     <- LINK(-a,P), LINK(-a,P) <- S. Now set
    #
    #                  { (-a,0), if B(P) =  a;
    #     (B(S),B(R))<-{ ( 0,0), if B(P) =  0;
    #                  { ( 0,a), if B(P) = -a;
    #
    #     and then set B(P) <- 0
        P = LINK(-a,R)
        setLINK(-a, R, LINK(a,P))
        setLINK(a,P, R)
        setLINK(a, S, LINK(-a,P))
        setLINK(-a, P, S)
        if P.B == a:
            S.B = -a
            R.B = 0
        elif P.B == 0:
            S.B = 0
            R.B =0
        elif P.B == -a:
            S.B = 0
            R.B = a

    # A10. [Finishing touch.] If S = RLINK(T) then set RLINK(T) <- P, otherwise set LLINK(T) <- P.
    if S == T.RLINK:
        T.RLINK = P
    else:
        T.LLINK = P

    return Q

---

As you can see, I changed very little; I kept the same variable names (even with their sort of dated single-capital letter characteristics). The only really tricky part was uncovering the implicit loops defined by his GOTO statements since Python thankfully doesn't actually support the GOTO statement, but even that was relatively straightforward (and remember that this is one of the most complex algorithms described in the series). Otherwise, a handful of modifications:

> 如您所見，我的變化很小。我保留了相同的變量名（即使帶有帶日期的單大寫字母特徵也是如此）。唯一真正棘手的部分是發現他的GOTO語句定義的隱式循環，因為Python幸運地實際上並不支持GOTO語句，但是即使那樣也相對簡單（請記住，這是本系列中描述的最複雜的算法之一） 。否則，進行一些修改：

I replaced Q <= AVAIL in steps A3 & A4 with an actual dynamic allocation.
Since the implied "convenience function" LINK(a, P) appears on both the right and left side of assignments, I just went ahead and implemented it with two separate functions; once to function as a getter and another to function as a setter.
Knuth sidestepped the creation of the first node in an empty tree, so I did too, although this would have been trivial to address.
In step A7, I skipped the step that kept track of the height of the tree, since it wouldn't work in Python, and isn't necessary to the algorithm; it would again be trivial to keep track of this somewhere else.
Otherwise I just typed in exactly what was described by the algorithm and got a functioning, if not very Pythonic, AVL implementation.

> 我在步驟A3和A4中將Q <= AVAIL替換為實際的動態分配。
由於隱含的“便利功能” LINK（a，P）出現在作業的左側和右側，因此我繼續使用兩個單獨的功能來實現它；一次用作getter，另一次用作setter。
Knuth避開了在空樹中創建第一個節點的過程，所以我也這樣做了，儘管要解決這個問題很簡單。
在步驟A7中，我跳過了跟踪樹的高度的步驟，因為它在Python中不起作用，並且對於算法而言不是必需的；在其他地方跟踪它再次變得微不足道。
否則，我只是鍵入算法描述的內容，並獲得了有效的AVL實現（如果不是Pythonic的話）。

So there you have it - if you're still skeptical about tackling TAOCP and the only thing keeping you away is the use of Knuth's MIX Assembler, rest assured that you can skip all of the MIX and still understand everything that's presented. Still, you might start to change your mind about investing the time to learn MIX once you get started; it's actually a lot of fun to work through.

> 因此，您就可以擁有它-如果您仍然對解決TAOCP持懷疑態度，而讓您遠離的唯一原因就是使用Knuth的MIX彙編器，請放心，您可以跳過所有MIX，並且仍然了解呈現的內容。不過，一旦開始，您可能會開始改變想法，投入時間來學習MIX。實際上，這很有趣。